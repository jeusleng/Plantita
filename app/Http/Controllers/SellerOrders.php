<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerOrders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $plantitas = DB::select('SELECT DISTINCT users.first_name, users.last_name, order_plantita.orderno, order_plantita.transno, order_plantita.itemno, plantita.itemdesc, plantita.img, order_plantita.price, order_plantita.status, order_plantita.remarks, users.gcash_no, payment.gcashrefno, payment.amount
        FROM order_plantita 
        INNER JOIN `order` ON order_plantita.orderno = `order`.orderno
        INNER JOIN users ON `order`.regno = users.regno
        INNER JOIN plantita ON order_plantita.itemno = plantita.itemno
        INNER JOIN payment ON order_plantita.transno = payment.transno
        WHERE plantita.regno = ? ', [$regno]);


        return view('seller.sellerOrdersPage', ['plantitas' => $plantitas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $regno = session('regno');
        $plantitas = DB::select('SELECT DISTINCT users.first_name, users.last_name, order_plantita.orderno, order_plantita.transno, order_plantita.itemno, plantita.itemdesc, plantita.img, order_plantita.price, order_plantita.status, order_plantita.remarks, users.gcash_no, payment.gcashrefno, payment.amount
        FROM order_plantita 
        INNER JOIN `order` ON order_plantita.orderno = `order`.orderno
        INNER JOIN users ON `order`.regno = users.regno
        INNER JOIN plantita ON order_plantita.itemno = plantita.itemno
        INNER JOIN payment ON order_plantita.transno = payment.transno
        WHERE plantita.regno = ? AND order_plantita.transno = ?', [$regno, $id]);
        return view('seller.sellerOrderEditPage', ['plantitas' => $plantitas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = $request->input('status');
        $remarks = $request->input('remarks');

        DB::table('order_plantita')->where('transno', $id)->update([
            'status' => $status,
            'remarks' => $remarks,
        ]);

        return redirect()->route('sellerOrders.index')->with('success', 'Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
