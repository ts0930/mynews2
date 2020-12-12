<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use folder;

class TaskController extends Controller
{
 public function index()
    {
        $folders = Folder::all();

        return view('tasks/index', [
            'folders' => $folders,
             ]);
    }   
}
