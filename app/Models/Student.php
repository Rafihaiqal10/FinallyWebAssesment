<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "nis",
        "nama",
        "kelass_id",
        "tgl_lahir",
        "alamat",
        "created_at"
    ];

    protected $with = "school";

    public function school(){
        return $this->belongsTo(Ilhams::class,"kelass_id");
    }
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('nama', 'like', '%'. $filters['search'] . '%')
                ->Orwhere('alamat', 'like', '%'. $filters['search'] . '%');
        }
    }
}
