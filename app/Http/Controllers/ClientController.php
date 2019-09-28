<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ClientStore;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function clients()
    {
        //$clients = User::all();

        /*$clients = User::where('email_verified_at', '<>', null)
            ->orderBy('name', 'asc')->take(7)->get();*/

        $clients = User::paginate(7);

        //$clients = User::simplePaginate(7);

        /*$clients = User::where('email_verified_at', '<>', null)
            ->orderBy('name', 'asc')->paginate(5);*/

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

    public function store()
    {
        $client = new User;
        $client->name = 'Federico II';
        $client->last_name = 'Mendez';
        $client->email = 'feder@gmail.com';
        $client->phone = '+789654214587';
        $client->password = Hash::make('secret123');
        $client->save();
        return 'Ok';
    }

    public function massAssignment()
    {
        $data = [
            'name' => 'Sofia II',
            'last_name' => 'Lugo',
            'email' => 'Sofia77@gmail.com',
            'phone' => '+1236547897',
            'password' => Hash::make('sofia123'),
        ];

        $client = User::create($data);

        return 'OK... El usuario '.$client->name.' ha sido creado correctamente.';
    }

    public function massAssignmentFill()
    {
        $data = [
            'name' => 'Carlos',
            'last_name' => 'Sans',
            'email' => 'carlos22@gmail.com',
            'phone' => '+12345454577',
            'password' => Hash::make('carlos123'),
        ];

        $client = new User;
        $client->fill($data);
        $client->save();

        return 'OK. El cliente '.$client->name.' ha sido almacenado.';
    }

    public function actualizar()
    {
        $data = [
            'name' => 'Charles',
            'last_name' => 'Carpum',
            'email' => 'testing422@gmail.com',
        ];

        $client = User::find(11);

        //$client->last_name = 'Moria';
        //$client->phone = '+58796666661';

        $client->fill($data);
        $client->save();

        return 'Ok, registro actualizado!';
    }

    public function update()
    {
        User::where('id', 9)->update(['name' => 'Hans']);

        User::where('last_name', 'Lugo')->update([
            'last_name' => 'Marquez',
            'phone' => '+441111111111'
        ]);

        return 'Ok.';
    }

    public function delete()
    {
        /*$client = User::find(29);
        $client->delete();*/

        User::destroy(21,22,23);

        User::where('name', 'Otis')->delete();

        return 'Eliminado correctamente.';
    }
}
