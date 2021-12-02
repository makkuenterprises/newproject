<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'user_id',
        'order_id',
        'accn_holder_name',
        'bank_name',
        'ifsc_code',
        'account_no',
    ];
}
