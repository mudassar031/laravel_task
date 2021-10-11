<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $save = User::find(Auth::user()->id);
        $save->email = $request->email;
        $save->save();
        return redirect()->back()->with('message', 'Email update successfully!');
    }

}
