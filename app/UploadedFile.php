<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $fillable = ['*'];

    public function studentEntry() {
        return $this->belongsTo('App\StudentEntry');
    }
}
