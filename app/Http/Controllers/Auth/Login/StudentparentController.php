<?php

namespace App\Http\Controllers\Auth\Login;

use App\Models\Order;
use App\Models\Student;
//use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use Illuminate\Support\Facades\Hash;

class StudentparentController extends DefaultLoginController
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/parent';

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
