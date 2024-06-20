<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureDocs extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $table = 'future_docs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

