<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'start_time', 'end_time', 'category', 'color'
    ];
    
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}




    

