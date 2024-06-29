<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequirement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'user_requirements';
    protected $guarded = [];
}
