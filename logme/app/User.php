<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function tagsWithCount()
    {
        return $this->tags()
            ->selectRaw('tags.*, count(*) as activity_count')
            ->leftJoin('activity_tag', 'tags.id','=','tag_id')
            ->groupBy('tags.id')
            ->orderBy('activity_count');
    }

    public function recentProjects()
    {
        return $this->projects()
            ->selectRaw('projects.*, activities.updated_at as last_usage')
            ->leftJoin('activities', 'activities.project_id', '=', 'projects.id')
            ->groupBy('projects.id')
            ->groupBy('activities.updated_at')
            ->orderBy('activities.updated_at');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
