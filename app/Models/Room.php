<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'reserved',
        'first_price',
        'final_price',
        'total_price',
        'room_type',
        'room_num',
        'rev_date',
        'rev_ex_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
