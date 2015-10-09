<?php

namespace App\Http\Controllers;

use App\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityTracker extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('activity'))
        {
            $str = $request->get('activity');

            $projects = [];
            $tags = [];

            //Strip Tags
            preg_match_all("/#\w+/", $str, $matches);

            if(count($matches) > 0)
            {
                $tags = $matches[0];
                for($i = 0; $i < count($tags); $i++)
                {
                    $str = str_replace($tags[$i], '', $str);
                    $tags[$i] = substr($tags[$i], 1);
                }
            }

            //Find Projects
            preg_match_all("/@\w+/", $str, $matches);

            if(count($matches) > 0)
            {
                $projects = $matches[0];
                for($i = 0; $i < count($projects); $i++)
                {
                    $str = str_replace($projects[$i], '', $str);
                    $projects[$i] = substr($projects[$i], 1);
                }
            }

            $comment = $str;
            $time = \DateInterval::createFromDateString($str);

//            dump($projects);
//            dump($tags);
//            dump($comment);
//            dump($time);

            $myProjects = \App\User::find(1)->projects()->get();

//            dump($myProjects);
            $fp = [];
            foreach($myProjects as $p)
            {
                foreach($projects as $pr)
                {
                    if(str_contains($pr, $p->title))
                        $fp[] = $p;
                }
            }

//            dump($fp);

            $activity = new Activity();
            $activity->comment = $comment;
            $activity->end = $activity->start = new \DateTime();
            $activity->start->sub($time);
            $activity->project_id = $fp[0]->id;
            $activity->value = 0;
            $activity->user_id = 1;
            $activity->value_type_id = 1;
            $activity->save();

        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
