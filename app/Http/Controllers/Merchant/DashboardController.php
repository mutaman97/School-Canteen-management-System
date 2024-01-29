<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Order;
use App\Models\Option;
use Auth;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
//        $orders = Order::where([['user_id', Auth::id()],['price','>',0]])->with('plan','orderlog')->latest()->take(5)->get();
//        $total_active_stores=Tenant::where([['user_id',Auth::id()],['will_expire','>',now()],['status',1]])->count();
        $total_active_stores = 0;
        return view('merchant.dashboard',compact('total_active_stores'));
    }

    public function staticData()
    {
//        TODO
//        $total_stores=Tenant::where('user_id',Auth::id())->count();
        $total_stores = 10;
//        $total_active_stores=Tenant::where([['user_id',Auth::id()],['will_expire','>',now()],['status',1]])->count();
        $total_active_stores = 3;
//        $total_expires=Tenant::where([['user_id',Auth::id()],['will_expire','<',now()]])->count();

        $total_expires=7;


        $data['total_active_stores']=number_format($total_active_stores);
        $data['total_expires']=number_format($total_expires);
        $data['total_stores_count']=$total_stores;
        $data['fund']=number_format(Auth::user()->amount,2);

        $date= Carbon::now()->addDays(15)->format('Y-m-d');
//        $data['upcoming_renewals']=Tenant::where([['status',1],['will_expire','<=',$date]])->where('user_id',Auth::id())->latest()->take(5)->with('orderwithplan')->get()->map(function($q){
//            $data['id']=$q->id;
//            $data['will_expire']=$q->will_expire;
//            $data['invoice_no']=$q->orderwithplan->invoice_no ?? '';
//            $data['plan']=$q->orderwithplan->plan->name ?? '';
//            $data['renew_plan']=$q->orderwithplan->plan_id ?? '';
//
//            return $data;
//        });
//        $data['upcoming_renewal_count']=Tenant::where([['status',1],['will_expire','<=',$date]])->where('user_id',Auth::id())->latest()->count();
        $data['upcoming_renewals'] = null;
        $data['upcoming_renewal_count'] = 2;
        return response()->json($data);

    }
}
