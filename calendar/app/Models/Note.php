<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // Tambahkan title dan content ke $fillable
    protected $fillable = ['title', 'content'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
