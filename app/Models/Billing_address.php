<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing_address extends Model
{
    use HasFactory;
    protected $fillable =['id','full_name','email','phone','country','address','city','state','zip','user_id'];

}
