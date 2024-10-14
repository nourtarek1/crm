<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = "leads";
    protected $fillable = [

        'id', 'name', 'phone', 'channel', 'action', 'status', 'note', 'sales_id', 'unit_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
   
}
