<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        return view('listings.index',[
            'heading' => 'Latest Job List',
            'jobList' => Job::all()
        ]);
    }

    //show a single job
    public function show(Job $job){
        return view('listings.show',[
            'job' => $job
        ]);
    }

    // common Resource Routes:
    // index - Show all listings
    // show - Show single listings
    // create - Show form to create new listing
    // store - Store new listing
    // edit - Show from to edit listing
    // update - Update listing
    // destory - Delete listing
}
