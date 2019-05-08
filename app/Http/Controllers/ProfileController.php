<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a user's profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $user = \App\User::where('id', $id)->first();
        if (!$user)
            $user = Auth::user();
        return view('profile', [ 'user' => $user, 'profile' => $user->profile ]);
    }
}
