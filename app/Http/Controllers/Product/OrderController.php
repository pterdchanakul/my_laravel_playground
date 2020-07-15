<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessOrder;

class OrderController extends Controller
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

    public function orderFormIndex()
    {
        return view('product.order_form');
    }

    public function processOrderForm(Request $request)
    {
        $data = array(
            'order_number' => $request->order,
            'buyer' => $request->buyer,
            'seller' => $request->seller,
            'product_name' => $request->product,
            'amount' => $request->amount,
            'total_price' => $request->total_price
        );
        ProcessOrder::dispatch($data);
        return response()->json(array("สถานะ" => "ข้อมูลรอการ Process"), 202);
    }
}
