<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FireIncident extends Model
{
    use Notifiable;

    protected $fillable = ['title','first_name','last_name','email','phone_number','message'];

}
