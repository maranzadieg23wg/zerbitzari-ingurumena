<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\erabiltzaileak;

class UserController extends Controller
{

    public function getUserDate(Request $request)
    {
        $users = erabiltzaileak::all();
        return response()->json($users);
    }

}