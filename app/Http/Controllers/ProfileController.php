<?php
namespace App\Http\Controllers;

use \App\User;
use \App\Profile;
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
     * Do nothing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

    }

    /**
     * Display a user's profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(int $id)
    {
        $user = \App\User::where('id', $id)->first();
        if (!$user)
            $user = Auth::user();
        return view('profile', [ 'user' => $user, 'profile' => $user->profile ]);
    }


    /**
     * Show the form for editing a users profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::find($id);
        $profile = $user->profile;
        return view('profileForm', [
            'user' => $user,
            'profile' => $profile,
            'edit' => true
        ]);
    }


    /**
     * Update user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'fname' => 'required',
            'lname' => 'required'
        ], [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.'
        ]);

        $user = User::find($id);
        $profile = $user->profile;
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->body = $request->body;
        $profile->save();

        return redirect()->route('profiles.show', [ 'id' => $user->id ])
                         ->with('message', 'User profile has been updated!');
    }
}
