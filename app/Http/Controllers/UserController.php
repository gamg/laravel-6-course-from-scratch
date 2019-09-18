<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function allUsers()
    {
        $users = DB::table('users')->get();
        return view('data', ['users' => $users]);
    }

    public function user()
    {
        $user = DB::table('users')->find(15);
        return view('user', ['user' => $user]);
    }

    public function condition()
    {
        $users = DB::table('users')
            ->where('last_name', 'Grant');
        return view('data', ['users' => $users]);
    }

    public function phones()
    {
        $usersPhones = DB::table('users')->pluck('phone');
        return view('phones', ['usersPhones' => $usersPhones]);
    }

    public function others()
    {
        // $users = DB::table('users')->count();

        $users = DB::table('users')
            ->where('name', 'Pedro')->exists();

        return dd($users);
    }

    public function selection()
    {
        /*$users = DB::table('users')
            ->select('name', 'last_name')->get();*/

        /*$users = DB::table('users')
            ->select('name', 'last_name as apellido')->get();*/

        /*$query = DB::table('users')
            ->select('name', 'last_name');

        $users = $query->addSelect('email')->get();*/

        $users = DB::table('users')->select()->get();

        return dd($users);
    }

    public function store()
    {
        /*DB::table('users')->insert([
            'name' => 'Gustavo',
            'last_name' => 'Meza',
            'email' => 'gustavo11@gmail.com',
            'phone' => '+5724589878',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);*/

        DB::table('users')->insert([
            [
                'name' => 'Juan',
                'last_name' => 'Perez',
                'email' => 'juancho77@gmail.com',
                'phone' => '+5724589878',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' => 'Zara',
                'last_name' => 'Mendez',
                'email' => 'mendezz4@gmail.com',
                'phone' => '+57244565778',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]
        ]);
    }

    public function update()
    {
        DB::table('users')->where('id', 28)
            ->update(['last_name' => 'Rivas', 'phone' => '+5789999999']);
        return 'Actualizado!';
    }

    public function delete()
    {
        //DB::table('users')->where('id', 29)->delete();

        DB::table('users')->where('last_name', 'Grant')->delete();
        return 'Eliminado!';
    }
}
