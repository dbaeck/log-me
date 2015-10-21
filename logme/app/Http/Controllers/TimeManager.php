<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimeManager extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = User::firstOrNew(['id' => 1]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->user->projects()->withTotal()->get();

        $start = new Carbon();
        $end = clone $start;
        $start->sub(new \DateInterval('P1M'));

        $activities = $this->user
            ->activities()
            ->where('starttime', '>', $start->toDateTimeString())
            ->where('starttime', '<', $end->toDateTimeString())
            ->orderBy('starttime', 'asc')
            ->get();

        $daily = [];

        foreach($activities as $activity)
        {
            $day = $activity->starttime->toDateString();
            if(!array_key_exists($day, $daily))
            {
                $daily[$day] = [];
            }

            $daily[$day][] = $activity;
        }

        $dailyFilled = [];

        while($start < $end)
        {
            $day = $start->toDateString();
            $dailyActivity = new Activity(['value' => 0, 'starttime' => $start]);
            $dailyActivity->day = $day;

            if(array_key_exists($day, $daily))
            {
                foreach($daily[$day] as $activity)
                {
                    $dailyActivity->value += $activity->value;
                }
            }

            $dailyFilled[] = $dailyActivity;
            $start->add(new \DateInterval('P1D'));
        }



        \JavaScript::put([
            'projects' => $projects,
            'activities' => $dailyFilled
        ]);

        return view('time.view');
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
        //
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
