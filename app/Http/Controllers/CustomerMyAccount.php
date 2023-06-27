<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerMyAccount extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $users = DB::select('SELECT * FROM users WHERE regno = ?', [$regno]);

        return view('customer.customerMyAccPage', ['users' => $users]);
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
        $users = DB::select('SELECT * FROM users WHERE regno = ?', [$id]);
        return view('customer.customerMyAccEditPage', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'userBirthday' => 'required|date',
            'gcashno' => 'required|numeric',
            'username' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required|same:password',
        ]);


        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $address = $request->input('address');
        $userBirthday = $request->input('userBirthday');
        $gcashno = $request->input('gcashno');
        $username = $request->input('username');
        $password = $request->input('password');

        $hashedNewPassword = Hash::make($password);

        DB::update('UPDATE users SET username = ?, birthday = ?, `password` = ?, first_name = ?, last_name = ?, `address` = ?, gcash_no = ? WHERE regno = ?', [$username, $userBirthday, $hashedNewPassword, $first_name, $last_name, $address, $gcashno, $id]);

        return redirect()->route('MyAccountCustomer.index')->with('success', 'Account Credentials Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
