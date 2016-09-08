<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function users(){
        return $this->belongsTo('App\Models\User', 'foreign_id');
    }
}
