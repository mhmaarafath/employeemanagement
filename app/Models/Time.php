<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'start',
        'end',
        'duration',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');

    }

}
