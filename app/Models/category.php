<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'main_id'];


    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function subcategory()
    {
        return $this->hasMany(category::class, 'main_id');
    }

    public function main()
    {
        return $this->belongsTo(category::class, 'main_id');
    }
}
