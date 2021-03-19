<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable=[
        'title_notes',
        'notes_description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
