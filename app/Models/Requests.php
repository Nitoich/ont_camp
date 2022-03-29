<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'old',
        'camp_id'
    ];

    protected $with = ['camp'];

    public function camp() {
        return $this->hasOne(Camp::class, 'id', 'camp_id');
    }

}
