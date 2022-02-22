<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerIp extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_ip_view_id',
        'user_ip'
    ];
}
