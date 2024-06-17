<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use HasFactory;
    use Notifiable;
    protected  $guarded = [];
    protected $table = 'staffs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function roles()
//    {
//        return $this->belongsToMany(Unit::class, 'role_staff','user_id', 'unit_id');
//    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'role_staff')->withPivot('role_id');
    }
}
