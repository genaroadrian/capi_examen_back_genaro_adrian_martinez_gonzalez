<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('domicilio')->get();
        $usersArray = $users->map(function ($user) {
            $edad = now()->diffInYears($user->fecha_nacimiento);
            $user->edad = $edad;
            return $user;
        });
        return response()->json($usersArray);
    }
}
