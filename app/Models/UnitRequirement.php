<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitRequirement extends Model
{
    use HasFactory;

    public $timestamps = false;
     protected $table = 'requirement';
    protected $fillable = ['unit_id', 'requirement'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
