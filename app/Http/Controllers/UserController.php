<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function getName()
    {
        $user = User::find(2);
        return $user->name;
    }

    public function getNameLastName()
    {
        $user = User::find(6);
        return $user->full_name;
    }

    public function changeName()
    {
        $user = User::find(8);
        $user->name = 'VICENTE II';
        $user->save();
        return 'OK';
    }
}
