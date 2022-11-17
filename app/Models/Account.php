<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class Account extends Model
{
//    use \App\Models\Traits\Uuid;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'phone',
        'gender',
        'status',
        'address',
        'password',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


}
