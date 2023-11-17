<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TrackingLog extends Model
{
    use HasFactory;
    $log -> new TrackingLog();
    $log->message = 'Some activity message';
    $log->user_id = auth()->id;
    $log->save();
}
