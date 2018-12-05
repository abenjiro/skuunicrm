<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
    	'school_name', 'contact_person', 'role','phone','email'
    ];
}
