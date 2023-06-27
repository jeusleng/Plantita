<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserAuth extends Controller
{
    public function login(Request $req)
    {

        $this->validate($req, [
            'username' => 'required',
            'password' => 'required',

        ]);
        $username = $req->input('username');
        $password = $req->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        //create UI for echoing
        if ($user) {
            if (Hash::check($password, $user->password)) {
                // Password matches
                if ($user->user_type === 'seller') {
                    // User is a seller
                    $req->session()->put('regno', $user->regno);
                    return redirect('sellerPage')->with('success', 'Log in successful');
                } elseif ($user->user_type === 'customer') {
                    // User is a customer
                    $req->session()->put('regno', $user->regno);
                    return redirect('customerPage')->with('success', 'Log in successful');
                } else {
                    // Role not specified or invalid
                    return redirect('/')->with('error', 'Authentication successful! Invalid role specified!');
                }
            } else {
                // Password does not match
                return redirect('/')->with('error', 'Incorrect Username or Password');
            }
        } else {
            // User record does not exist
            return redirect('/')->with('error', 'User does not exist');
        }
    }

    public function customerMyAccRoute()
    {
        return redirect()->route('MyAccountCustomer.index');
    }

    public function sellerMyAccRoute()
    {
        return redirect()->route('MyAccountSeller.index');
    }

    public function sellerPlantitaRoute()
    {
        return redirect()->route('sellerMyPlantita.index');
    }

    public function customerMarketplaceRoute()
    {
        return redirect()->route('customerMarketplace.index');
    }

    public function customerPaymentRoute(Request $request)
    {

        $items = $request->input('itemno');

        if (!empty($items)) {
            $orders = DB::table('plantita')
                ->join('users', 'plantita.regno', '=', 'users.regno')
                ->whereIn('itemno', $items)
                ->select('plantita.itemno', 'plantita.itemdesc', 'plantita.itemprice', 'plantita.img', 'users.username', 'users.first_name', 'users.last_name', 'users.gcash_no')
                ->get();


            foreach ($items as $item) {
                DB::insert('INSERT INTO temp_pay (itemno) VALUES (?)', [$item]);
            }

            $sum = DB::select('SELECT SUM(plantita.itemprice) AS totalprice FROM temp_pay INNER JOIN plantita ON temp_pay.itemno = plantita.itemno');


            $request->session()->put('orders', $orders);
            $request->session()->put('sum', $sum);
            // dd($orders);
            return redirect()->route('customerPayment.index');
            // return view('customer.customerPaymentPreviewPage', ['orders' => $orders, 'sum' => $sum]);
        } else {
            return redirect()->route('customerMarketplace.index')->with('error', 'Please select at least one item.');
        }
        //
    }

    public function customerMyOrdersRoute()
    {
        return redirect()->route('customerOrders.index');
    }
    public function sellerOrdersRoute()
    {
        return redirect()->route('sellerOrders.index');
    }
}
