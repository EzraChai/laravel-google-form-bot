<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
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

    public function index(User $user){
        return view("edit-profile",compact('user'));
    }

    public function edit(Request $request){

        $validated = $request -> validate([
            'name' => ['required', 'string','min:6', 'max:255'],
            'school_class' => ['required', 'string', 'max:30'],
        ]);

        $user = Auth::user();
        $user -> name = strtoupper($validated['name']);
        $user -> school_class = strtoupper($validated['school_class']);
        $user -> update();

        return redirect("home") -> with('success',"You've edited your profile.");
    }
}
