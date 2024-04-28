<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";
    protected $fillable = ["name", "color", "button_one","button_two","button_three","button_four", "background_color", "background_image", "background_phone"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Automatically assign the user_id when creating a new project.
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($project) {
            if (!$project->user_id && auth()->check()) {
                $project->user_id = auth()->id();
            }
        });
    }
}
