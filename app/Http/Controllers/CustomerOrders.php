<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $users = DB::select('SELECT order_plantita.orderno, order_plantita.transno, order_plantita.itemno, plantita.itemdesc, plantita.img, order_plantita.price, order_plantita.status, order_plantita.remarks, `order`.regno, payment.amount, payment.gcashrefno
        FROM order_plantita
        INNER JOIN `order` ON order_plantita.orderno = `order`.orderno
        INNER JOIN `plantita` ON order_plantita.itemno = plantita.itemno
        INNER JOIN payment ON order_plantita.transno = payment.transno
        WHERE `order`.regno = ?', [$regno]);

        return view('customer.customerMyOrdersPage', ['users' => $users]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('DELETE FROM order_plantita WHERE transno = ?', [$id]);

        return redirect()->route('customerOrders.index')->with('warning', 'Order Cancelled');
    }
}
