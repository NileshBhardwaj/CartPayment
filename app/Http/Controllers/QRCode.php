<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class QRCode extends Controller
{
    //
    public function qr_code()
    {
        // Get the currently authenticated user's ID
        $id = Auth::id();
        $user = \DB::table('users')->where('id',$id)->first();
        // dd($user);
        

        $qr = \DB::table('qr_codes')->where('user_id', $id)->first();

    if(!isset($qr)){
        $token = Str::random(10);
        $qr_codes=\DB::table('qr_codes')->insert([
            'token' => $token,
            'expires_at' => now()->addMinutes(1),
            'created_at' => now(),
            'user_id'=>$id,
        ]);
    }
    else{
        $get_token = \DB::table('qr_codes')->where('user_id', $id)->first();
        // dump($get_token);
    }
    $token = $get_token->token;

        return view('/user',compact('token','user'));
    }
}
