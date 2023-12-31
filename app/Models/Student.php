<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class, 'assessments', 'student_id', 'criteria_id')
            ->withPivot('score');
    }
}
