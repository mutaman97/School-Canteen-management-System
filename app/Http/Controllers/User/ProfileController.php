<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $info=Student::find(Auth::guard('user')->id());
        $storesCount = 5;
        $fund=500;

        $totalEarnings = null;
//        if (Auth::user()->role_id == 3)
//        {
//            $year=Carbon::parse(date('Y'))->year;
//            // $today=Carbon::today();
//            $totalEarnings=Order::where('payment_status',1)->where('status_id',1)->whereYear('created_at', '=',$year)->sum('total');
//            $totalEarnings=amount_format($totalEarnings);
//        }
        return view('user.my_profile',compact('info','storesCount','fund','totalEarnings'));
    }

    public function genUpdate(Request $request)
    {
        $request->validate([
            // 'file' => 'image',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile' => 'required|string|min:10|max:10',
            'whatsapp' => 'required|string|min:10|max:10',
            'name' => 'required',
            // 'subscribed_to_newsletter' => 'required',

        ]);


        $user=Student::find(Auth::guard('user')->id());

        $user->student_parent=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->whatsapp=$request->whatsapp;
//        $user->subscribed_to_newsletter=$request->has('subscribed_to_newsletter');

        $user->save();



        return response()->json(['Updated Successfuly']);

    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $info=Student::where('id', Auth::guard('user')->id())->first();

        $check=Hash::check($request->oldpassword, Auth::guard('user')->user()->password);

        if ($check==true) {
            Student::where('id', Auth::guard('user')->id())->update(['password'=>Hash::make($request->password)]);

            return response()->json(['Password Changed Successfully']);

        }
        else{

            return Response()->json(['Enter Valid Password'], 401);

        }
    }
}
