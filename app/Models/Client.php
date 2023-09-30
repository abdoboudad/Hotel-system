<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'card_type',
        'card_number',
    ];

    protected $table = 'clients';

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
