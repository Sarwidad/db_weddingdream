<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTalent extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'title',
        'description',
        'status',
        'category',
        'talent_count',
        'period',
        'salary_estimate',
    ];
    protected $table = 'open_talents';

    public function vendor()
    {
        return $this->hasMany(Vendor::class);
    }
    public function talent()
    {
        return $this->belongsToMany(Talent::class, 'talent_open_talents', 'open_talents_id', 'talent_id');
    }

}
