<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'stage_id',
        'client_id',
        'client_name',
        'opportunity',
        'email',
        'mobile_no',
        'expected_price',
        'probability',
        'priority',
        'tag',
        'expected_closing',
    ];
}
