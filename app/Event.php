<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = ['id', 'finished_at'];
    protected $dates = ['starts_at', 'finished_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
