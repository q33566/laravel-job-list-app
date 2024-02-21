<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index(){
        return view('listings.index',[
            'jobList' => Job::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    //show a single job
    public function show(Job $job){
        return view('listings.show',[
            'job' => $job
        ]);
    }

    //show create form
    public function create(Job $job){
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        Job::create($formFields);

        return redirect('/')->with('message','Listing Created!');
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
