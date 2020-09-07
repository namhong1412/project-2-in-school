<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $table = "admin";
    public $fillable = ['id', 'username', 'password', 'phone_number', 'kind'];
}
