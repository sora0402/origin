<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'diary_jobs';
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];
}
