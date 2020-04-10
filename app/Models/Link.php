<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = [
        'short', 'origin',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
