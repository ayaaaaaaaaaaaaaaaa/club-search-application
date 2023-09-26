<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cloudinary;

class UserController extends Controller
{
    public function user()
    {
        return view('users.index');
    }
}
