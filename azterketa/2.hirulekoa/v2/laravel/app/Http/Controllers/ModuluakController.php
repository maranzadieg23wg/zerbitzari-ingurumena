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

    

    

}