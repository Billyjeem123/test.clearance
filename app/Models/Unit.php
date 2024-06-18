<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $table = 'units';

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'role_staff','user_id', 'unit_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'unit_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_staff', 'unit_id', 'user_id');
    }



}
