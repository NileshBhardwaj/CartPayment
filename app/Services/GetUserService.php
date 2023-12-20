<?php
namespace App\Services;
use App\Models\User;
class GetUserService
{
    public function get_registered_user()
    {
        return User::all();
    }
}