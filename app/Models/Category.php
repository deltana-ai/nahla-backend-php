<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function webs()
    {
        return $this->hasMany(Web::class);
    }

    public function apps()
    {
        return $this->hasMany(App::class);
    }
}
