<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class baseballcontroller extends Controller
{
    public function add()
    {
    return view('admin.baseball.giants');
    }

}