<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    use HasFactory;

    protected $fillable = [
        'region',
        'office_type',
        'office_name',
        'project_name',
        'activities',
        'uploaded_by',
        'file_path',
    ];

    protected $casts = [
        'activities' => 'array',
        'uploaded_by' => 'array',
    ];
}