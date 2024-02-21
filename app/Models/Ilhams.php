<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilhams extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'created_at',
    ];
    public function student()
    {
        return $this->hasMany(Student::class,"kelass_id");
    }
}
