<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
   public $table = 'events';

   protected $fillable = ['event_name', 'event_date'];

   // public $timestamps = false;
}
