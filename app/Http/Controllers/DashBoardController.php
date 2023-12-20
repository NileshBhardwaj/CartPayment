<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\CustomService;
class DashBoardController extends Controller
{
    //
    protected $service;

    public function __construct(CustomService $service) {
        $this->service = $service;
    }

    public function ShowUserlist()
    {
        $limit = 10;
        $message = $this->service->printMessage();
        $users = \DB::table('users')
        ->rightJoin('qr_codes', 'users.id', '=', 'qr_codes.user_id')
        ->select('users.*', 'qr_codes.token')
        ->get();
        // dd($users);
        
        
        return view('/dashboard', compact('users','message'));
    }
    
    public function fetchusers()
    {
        $users = User::all();
        return response()->json($users);
    }
    

}
