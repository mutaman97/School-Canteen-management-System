<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:studentparent');
    }

    public function index(Request $request)
    {
        $parent_code = Auth::guard('studentparent')->user()->parent_code;
//        dd($parent_code);

        $data = Order::where('parent_code', $parent_code);

        // $data = Order::with('getway', 'user','plan')->where('user_id', $id);
        if ($request->start_date || $request->end_date) {
            $start_date = $request->start_date . " 00:00:00";
            $end_date = $request->end_date . " 23:59:59";
            if ($request->start_date == '' && $request->end_date == '') {
                $data = $data->latest();
            } elseif ($request->start_date == '' && $request->end_date != '') {
                $data = $data->where('created_at', '<', $request->end_date)->latest();
            } elseif ($request->start_date != '' && $request->end_date == '') {
                $data = $data->where('created_at', '>', $request->start_date)->latest();
            } else {
                $data = $data->whereBetween('created_at', [$start_date, $end_date])->latest();
            }

        }
//        elseif ($request->type == 'student_name') {
//            $q = $request->value;
//            $data = $data->where('student_name', 'LIKE', "%$q%")->latest();
//
//        }
        elseif ($request->type == 'card_no') {
            $q = $request->value;
            $data = $data->where('card_no', 'LIKE', "%$q%")->latest();

        }
//        elseif ($request->type == 'plan') {
//            $q = $request->value;
//            $data = $data->whereHas('plan', function ($query) use ($q) {
//                return $query->where('name', 'LIKE', "%$q%");
//            })->latest();
//
//        }
        elseif ($request->type == 'amount') {
            $q = $request->value;
            $data = $data->where('balance', 'LIKE', "%$q%")->latest();

        }

        $data = $data->paginate(15);

        return view('parent.report.index', compact('data'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $data = Order::with('getway', 'user','plan','ordermeta')->where('user_id',Auth::id())->findOrFail($id);

        $parent_code = Auth::guard('studentparent')->user()->parent_code;

        $data = Order::where('parent_code',$parent_code)->findOrFail($id);

        $student = Student::where('parent_code', $parent_code)->firstOrFail();

//        dd($student->id);


        return view('parent.report.show', compact('data', 'student'));
    }


    public function invoicePdf($id)
    {
        $parent_code = Auth::guard('studentparent')->user()->parent_code;


        $data = Order::findOrFail($id);

//        dd($data);

        $student = Student::where('student_code', $data->student_code)->firstOrFail();

        $pdf = PDF::loadView('parent.plan.invoice-pdf', compact('data', 'student'));
        return $pdf->download('payment-invoice.pdf');
    }



}
