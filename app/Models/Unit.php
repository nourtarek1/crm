<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = "units";
    protected $fillable = [
        'title',
        'description',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_units');
    }
   
}
