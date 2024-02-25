<?php

namespace App\Http\Controllers;

use auth;

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
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();

        Job::create($formFields);

        return redirect('/')->with('message','Listing Created!');
    }

    public function edit(Job $job){
        return view('listings.edit',['job'=>$job]);
    }

    public function update(Request $request, Job $job){

        //Check if the editor is owner
        if($job->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }


        $job->update($formFields);

        return back()->with('message','Listing Updated!');
    }

    public function destory(Job $job){
        
        //Check if the editor is owner
        if($job->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $job->delete();
        return redirect('/')->with('message', 'Listing Deleted Sucessfully');
    }

    public function manage(){
        return view('listings.manage',['jobList' => auth()->user()->job()->get()]);
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
