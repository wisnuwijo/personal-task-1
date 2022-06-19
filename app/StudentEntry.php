<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEntry extends Model
{
    protected $fillable = ["*"];

    public function uploadedFile() {
        return $this->hasMany('App\UploadedFile', 'student_entries_id');
    }
}
