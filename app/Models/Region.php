<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public $fillable = [
        'name'
    ];
//    protected $with = ['camps'];
    public function camps() {
        return $this->hasMany(Camp::class, 'region_id', 'id');
    }
}
