<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function valueType()
    {
        return $this->hasOne(ValueType::class);
    }
}
