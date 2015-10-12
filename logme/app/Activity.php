<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['project_id', 'comment', 'user_id', 'value', 'starttime', 'endtime', 'value_type_id'];

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

    public static function createFromString($user, $str)
    {
        $tokenizer = (new Tokenizer($str))
            ->findEscapedComments()
            ->findTags()
            ->findProjects()
            ->processComments();

        $activities = [];

        foreach($tokenizer->projects as $proj)
        {
            $project = $user->projects()->where('title', $proj)->firstOrFail();
            $activity = new Activity([
                'user_id' => $user->id,
                'project_id' => $project->id,
                'comment' => $tokenizer->comments,
                'value' => 10,
                'starttime' => Carbon::now(),
                'endtime' => Carbon::now(),
                'value_type_id' => 1
            ]);

            $activity->save();
            $activities[] = $activity;
        }

        return $activities;
    }
}
