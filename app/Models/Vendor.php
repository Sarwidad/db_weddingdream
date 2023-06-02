<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'no_hp',
        'alamat',
        'nama_vendor',
        'desc_vendor',
        'range_harga',
        'kontak_vendor',
        'rating_vendor',
        'galeri_vendor',
        'fotoprofile'
    ];

    protected $hidden = [];
    protected $table = 'vendors';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function openTalents()
    {
        return $this->hasMany(OpenTalent::class);
    }
}
