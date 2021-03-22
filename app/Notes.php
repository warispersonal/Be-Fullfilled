<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
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
