<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'profesi',
        'range_harga'
    ];

    protected $hidden = [];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function openTalent()
    {
        return $this->belongsToMany(OpenTalent::class, 'talent_open_talents', 'talent_id', 'open_talents_id');
    }
}
