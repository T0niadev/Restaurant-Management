<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Servants;
use App\Models\Table;
use App\Models\Sales;
use App\Models\Menu;
use Illuminate\Http\Request;
use PDF;

class PaymentController extends Controller
{
    //
    public function index()
    {
        return view("payments.index")->with([
            "tables" => Table::all(),
            "categories" => Category::all(),
            "servants" => Servants::all()
        ]);


    }

    // public function pdfview(Request $request)

    // {

    //     $table = Table::all();
        // $categories = Category::all();
        // $servants = Servants::all();





    //         $pdf = PDF::loadView('payments.pdfview')->with([
                // "table" => Table::all(),
                // "categories" => Category::all(),
                // "servants" => Servants::all(),
                // "sale" => Sales::all()
    //         ]);


    //         return $pdf->download('payments.pdfview.pdf');
    // }


    // public function pdfview()
    // {



    //     $data = [

    //             "tables" => Table::all()
    //     ];




    // //  dd($data);
    //     $pdf = PDF::loadView('payments.pdfview', $data);

    //     return $pdf->download('receipt.pdf');
    // }




    public function pdfview()
    {

        // $sales = Sales::orderBy("created_at", "DESC")->first();


        $data = [
            // "sales" => Sales::all(),
            "sale" => Sales::orderBy("created_at", "DESC")->first()
        ];


    //  dd($data);
        $pdf = PDF::loadView('payments.pdf', $data);

        return $pdf->download('receipt.pdf');
    }
}
