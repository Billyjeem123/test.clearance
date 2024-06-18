<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected  $guarded = [];
    protected $table = 'documents';

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
