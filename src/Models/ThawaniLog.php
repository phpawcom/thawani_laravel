<?php

namespace S4D\Laravel\Thawani\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThawaniLog extends Model
{
    use HasFactory;
    protected $casts = [
        'products' => 'json',
        'metadata' => 'json',
    ];
}
