<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $fillable = ['owner_id', 'title', 'description'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
