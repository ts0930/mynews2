<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public static $box = array(
        'name'=>'required',
        'gender'=>'required',
        'hobby'=>'required',
        'introduction'=>'required',
        );
}
