<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function valueType()
    {
        return $this->hasOne(ValueType::class);
    }

    public function scopeWithTotal($query)
    {
        return $query->selectRaw('projects.*, sum(activities.value) as total')
            ->join('activities', 'projects.id', '=', 'activities.project_id')
            ->groupBy('projects.id');
    }
}
