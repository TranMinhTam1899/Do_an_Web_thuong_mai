<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class user extends Model
{
    // use softDeletes;
    protected $table = 'users';
}
