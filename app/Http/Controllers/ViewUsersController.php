<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewUsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
}
