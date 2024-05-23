<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'project_title', 'slug', 'description', 'cover_image', 'source_code', 'site_link', 'type_id'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
