<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    public function rombel(){
        return $this->belongsTo(rombel::class);
    }

    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'rombel_id',
    ];
}
