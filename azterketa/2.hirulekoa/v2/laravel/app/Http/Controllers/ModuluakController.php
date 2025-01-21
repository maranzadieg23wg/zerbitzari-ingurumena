<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\moduluak;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;  // Asegúrate de tener esta línea

class ModuluakController extends Controller{

    public function allModuluak(Request $request)
    {

        $modul = moduluak::all();

        return response()->json([
            'moduls' => $modul,
            
        ], 200); // 200 OK

    }

    public function matrikulatu($id, Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }
        
        $idUser = $user->id;
        $c = \App\Models\nmModul::create([
            'userID' => (int) $idUser,
            'modulID' => (int) $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return response()->json([
            'moduls' => $c,
            
        ], 200); // 200 OK

    }

    public function matrikulatutakoModuluak(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }
        
        $idUser = $user->id;
        $moduluakID = \App\Models\nmModul::where('userID', $idUser)->get()->pluck('modulID');;

        $moduluak = \App\Models\moduluak::whereIn('id', $moduluakID)->get();

        
        return response()->json([
            'moduls' => $moduluak,
            
        ], 200); // 200 OK

    }

    

    

}