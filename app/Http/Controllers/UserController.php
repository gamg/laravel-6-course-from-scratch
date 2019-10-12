<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function save(Request $request)
    {
        $request->session()->put('alias', 'squall');
        session(['nivel' => 47]);

        return 'Datos guardados en sesion';
    }

    public function show(Request $request)
    {
        $valueAlias = $request->session()->get('alias');
        $valueNivel = session('nivel');
        $valueAge = $request->session()->get('age', 15);
        $data = $request->session()->all();

        if ($request->session()->has('code')) {
            return 'La key si existe y no es nula';
        }

        if ($request->session()->exists('email')) {
            return 'La key email existe y puede tener un valor nulo';
        }

        return 'OK...';
    }

    public function delete(Request $request)
    {
        $value = $request->session()->pull('nivel');

        $request->session()->forget('email');

        if ($request->session()->exists('email')) {
            return 'La key email existe y puede tener un valor nulo';
        }

        return 'Eliminando...';
    }

    public function flash(Request $request)
    {
        $request->session()->flash('alerta', 'Datos almacenados correctamente.');

        return redirect('/');
    }

    public function createFlash(Request $request)
    {
        $request->session()->flash('alerta', 'Esto es un mensaje muy chulo!');

        return redirect('/mantener-flash');
    }

    public function keepFlash(Request $request)
    {
        $request->session()->reflash();

        return redirect('/');
    }
}
