<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public function items()
{
    return $this->hasMany(Item::class);
}
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
}
