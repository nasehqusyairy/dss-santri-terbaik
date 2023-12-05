<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'criteria_id', 'score'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
