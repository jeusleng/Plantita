<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Marketplace extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $plantitas = DB::select('SELECT plantita.itemno, plantita.itemdesc, plantita.itemprice, plantita.img, users.username, users.first_name, users.last_name FROM plantita INNER JOIN users ON plantita.regno=users.regno ORDER BY RAND();');

        return view('customer.customerMarketplacePage', ['plantitas' => $plantitas]);
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
        //
    }
}
