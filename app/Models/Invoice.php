<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
      'invoice_id',
      'user_id',
      'invoice_number',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
