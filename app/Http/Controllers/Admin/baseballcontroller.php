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

    
    public function create(Request $request)
    {
     $this->validate($request, News::$rules);
     $baseball=new Baseball;
     $form = $request->all();
}
}