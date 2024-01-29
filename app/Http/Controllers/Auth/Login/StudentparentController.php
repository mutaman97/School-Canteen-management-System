<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class StudentparentController extends DefaultLoginController
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/parent/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:studentparent')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login.student-parent');
    }

    public function username()
    {
        return 'parent_code';
    }

    protected function guard()
    {
        return Auth::guard('studentparent');
    }
}
