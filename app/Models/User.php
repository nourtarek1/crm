<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Unit;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id',
        'user_type',
        'parent_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'user_type' => 'array',

    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id');
    }
    public function parents()
    {

        return $this->belongsTo(User::class, 'parent_id', 'id');
    }
    public function childrens()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'user_units');
    }
   


    // public static function tree()
    // {
    //     $allusers = User::all();
    //     $parentUsers = $allusers->whereNull('parent_id');
    //     foreach ($parentUsers as $parent) {
    //         $parent->children = User::where('parent_id', $parent->id)->get();
    //     }
    //     return $parentUsers;
    // }
}
