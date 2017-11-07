<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (! auth()->attempt(request(['email', 'password'])) ) {
            return back()->withErrors([
                'message' => 'Could not log you in. Try again.'
            ]);
        }

        return back();

        //return redirect()->action('DashboardController@index');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
