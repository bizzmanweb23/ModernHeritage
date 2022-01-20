<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticDashboard extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id','start_time','end_time'];
}
