<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clients()
    {
        //$clients = User::all();
        $clients = User::where('email_verified_at', '<>', null)
            ->orderBy('name', 'asc')->take(7)->get();
        return view('data', ['users' => $clients]);
    }

    public function client()
    {
        //$client = User::find(7);
        //$client = User::find([2,5,12]);
        //$client = User::where('last_name', 'Meza')->first();
        //$client = User::findOrFail(3);
        //$client = User::where('last_name', 'Meza')->count();
        $client = User::where('last_name', 'Meza')->firstOrFail();
        return view('user', ['user' => $client]);
    }
}
