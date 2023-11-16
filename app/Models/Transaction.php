<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function destinations(){
    	return $this->belongsTo('\App\Models\Employee','destination','id');
    }
    public function department(){
        return $this->belongsTo('\App\Models\Employee','destination','id','last_visited_at');
    }
}