<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['project_id', 'comment', 'user_id', 'value', 'starttime', 'endtime', 'value_type_id'];
    protected $dates = ['created_at', 'updated_at', 'disabled_at', 'starttime', 'endtime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

        $loggedTime = $tokenizer->getTimes();

        $activities = [];

        foreach($tokenizer->projects as $projectStr)
        {
            $project = $user->projects()->where('title', $projectStr)->firstOrFail();
            $activity = new Activity([
                'user_id' => $user->id,
                'project_id' => $project->id,
                'comment' => $tokenizer->comments,
                'value' => $loggedTime->seconds,
                'starttime' => $loggedTime->start,
                'endtime' => $loggedTime->stop,
                'value_type_id' => 1
            ]);

            $activity->save();

            foreach($tokenizer->tags as $tagStr)
            {
                $tag = $user->tags()->where('title', $tagStr)->first();
                if(!isset($tag))
                    $tag = Tag::create(['title' => $tagStr, 'user_id' => $user->id]);

                $activity->tags()->save($tag);
            }

            $activities[] = $activity;
        }

        return $activities;
    }
}
