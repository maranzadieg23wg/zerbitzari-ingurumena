<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;  // Asegúrate de tener esta línea

class AuthController extends Controller{

    public function createUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'izena' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',	
        ]);

        // Si la validación falla, devolver un 400 Bad Request
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos incorrectos o incompletos.',
                'errors' => $validator->errors()
            ], 400); // 400 Bad Request
        }

        try {
            $user = User::create([
                'name' => $request->izena,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'user' => $user,
            ], 201); // 201 Created

        } catch (\Exception $e) {
            // En caso de error inesperado (ej. problemas con la base de datos)
            return response()->json([
                'message' => 'Ocurrió un error al crear el usuario.',
                'error' => $e->getMessage(),
            ], 500); // 500 Internal Server Error
        }

    }

    public function loging(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',	
        ]);

        // Si la validación falla, devolver un 400 Bad Request
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos incorrectos o incompletos.',
                'errors' => $validator->errors()
            ], 400); // 400 Bad Request
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Las credenciales proporcionadas son incorrectas.',
            ], 401);
        }

        $token = $user->createToken(64)->plainTextToken;


        return response()->json([
            'user' => $user,
                'token' => $token
            ]);


    }

    public function logOut(Request $request)
    {
        

        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $user->tokens()->delete(); // Revoca todos los tokens del usuario
        return response()->json(['message' => 'Sesión cerrada correctamente']);

    }

}