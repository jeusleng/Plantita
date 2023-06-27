<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class SignUp extends Controller
{
    public function createAcc(Request $request)
    {
        //add custom message please
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'userBirthday' => 'required|date',
            'gcashno' => 'required|numeric',
            'usertype' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required|same:password',
        ]);

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $address = $request->input('address');
        $userBirthday = $request->input('userBirthday');
        $gcashno = $request->input('gcashno');
        $usertype = $request->input('usertype');
        $username = $request->input('username');
        $password = $request->input('password');

        DB::table('users')->insert([
            'username' => $username,
            'birthday' => $userBirthday,
            'user_type' => $usertype,
            'password' => Hash::make($password),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'gcash_no' => $gcashno,
        ]);

        return redirect('/')->with('success', 'Account Created Successfully');
    }
}
