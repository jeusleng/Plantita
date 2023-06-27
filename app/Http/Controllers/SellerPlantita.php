<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SellerPlantita extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $plantitas = DB::select('SELECT * FROM plantita WHERE regno = ?', [$regno]);


        return view('seller.sellerPlantitaPage', ['plantitas' => $plantitas]);
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
        $request->validate([
            'desc' => 'required|max:50',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $regno = session('regno');
        $img = $request->file('img');
        $hashImg = $img->hashName();
        $desc = $request->input('desc');
        $price = $request->input('price');

        $img->store('images' , 'public');

        DB::insert('INSERT INTO plantita (itemdesc, itemprice, regno, img) VALUES (?,?,?,?)', [$desc, $price, $regno, $hashImg]);


        return redirect()->route('sellerMyPlantita.index')->with('success', 'Plantita Added Successfully');
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
        $plantitas = DB::select('SELECT * FROM plantita WHERE itemno = ?', [$id]);
        return view('seller.sellerPlantitaEditPage', ['plantitas' => $plantitas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'desc' => 'required|max:50',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $desc = $request->input('desc');
        $price = $request->input('price');

        $item = DB::table('plantita')->where('itemno', $id)->first();

        DB::table('plantita')->where('itemno', $id)->update([
            'itemdesc' => $desc,
            'itemprice' => $price,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $hashImg = $img->hashName();

            $img->store('images', 'public');
            DB::table('plantita')->where('itemno', $id)->update([
                'img' => $hashImg,
            ]);

            Storage::disk('public')->delete('images/' . $item->img);
        }

        return redirect()->route('sellerMyPlantita.index')->with('success', 'Plantita Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = DB::table('plantita')->where('itemno', $id)->first();
        Storage::disk('public')->delete('images/' . $item->img);
        DB::delete('DELETE FROM plantita WHERE itemno = ?', [$id]);

        return redirect()->route('sellerMyPlantita.index')->with('warning', 'Plantita Deleted');
    }
}
