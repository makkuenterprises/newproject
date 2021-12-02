<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescriptions extends Model
{
    protected $fillable = ['user_id','fullname','full_address','city','state','pin_code','phone','image','verified'];
    use HasFactory;
    
}
