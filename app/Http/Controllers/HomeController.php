<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		if (request()->user()->hasRole('admin') || request()->user()->hasVerifiedEmail()) {
			return redirect(route('articles.index'));
		} else {
			$email = request()->user()->email;
			return view('auth.verify', compact('email'));
		}
    }

    public function users() {
    	$users = User::latest()->get();
		return view('users', compact('users'));
	}
}
