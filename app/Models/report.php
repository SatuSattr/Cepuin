<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
        'user_id',
        'reported_name',
        'reported_class',
        'incident_time',
        'description',
        'photo_path',
        'status',
        'counselor_note',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
