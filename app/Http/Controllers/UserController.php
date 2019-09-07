<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = 'Gustavo';
        $lastname = 'Meza';
        $age = 31;
        //return view('example', ['name' => $name, 'lastname' => $lastname, 'age' => $age]);
        /*return view('example')->with('name', $name)
            ->with('lastname', $lastname)
            ->with('age', $age);*/
        return view('example', compact('name', 'lastname', 'age'));
    }

    public function numbers()
    {
        $num = 7;
        $data = '';
        $fruits = ['Manzana', 'Naranja', 'Parchita'];
        $array = ['manzana' => 47, 'pera' => 23, 'durazno' => 40];
        $users = ['Gustavo', 'Samuel', 'Federico'];
        $clients = ['Vicente' => ['v@gmail.com', 30], 'Zara' => ['z@gmail.com', 28]];
        return view('directives')->with('num', $num)
            ->with('data', $data)
            ->with('array', $array)
            ->with('fruits', $fruits)
            ->with('users', $users)
            ->with('clients', $clients);
    }
}
