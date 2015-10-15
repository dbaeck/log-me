<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityTracker extends Controller
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
//        dd($this->user->recentProjects()->get());
        return view('welcome')
            ->with('projects', $this->user->recentProjects()->get())
            ->with('tags', $this->user->tagsWithCount()->get())
            ->with('activities', $this->user->activities()->recent()->get());
    }

    public function tags()
    {
        return $this->user->tagsWithCount()->get()->toJson();
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
        $user = User::firstOrNew(['id' => 1]);
        if($request->has('activity'))
        {
            Activity::createFromString($user, $request->get('activity'));
        }
        else {

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
