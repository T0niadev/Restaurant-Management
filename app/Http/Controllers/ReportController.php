<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Sales;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class ReportController extends Controller
{


    public function index()
    {
        return view("reports.index");
    }

    public function generate(Request $request)
    {
        //validation
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        //get data
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $sales = Sales::whereBetween("created_at", [$startDate, $endDate])
            ->where("payment_status", "paid")->get();
        //return data

        // dd($sales);
        return view("reports.index")->with([
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $sales->sum('total_received'),
            "sales" => $sales
        ]);

    }

    public function export(Request $request)
    {

        $sales = Sales::all()->where("payment_status", "paid")->where('created_at', '>=', $request->from)
        ->where('created_at', '<=', $request->to);

        return (new FastExcel($sales))->download('file.xlsx');





    }





}
