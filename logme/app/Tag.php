<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title', 'user_id'];
    protected $appends = ['text', 'weight'];
    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function getTextAttribute()
    {
        return $this->title;
    }

    public function getWeightAttribute()
    {
        return isset($this->activity_count) ? $this->activity_count : 0;
    }
}
