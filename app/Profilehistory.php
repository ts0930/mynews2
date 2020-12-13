<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profilehistory extends Model
{
    protected $guarded = array('id');
    protected $table = 'profilehistories';

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
}
