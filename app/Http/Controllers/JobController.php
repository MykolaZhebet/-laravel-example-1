<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs = Job::all()->groupBy('featured');
        // return $jobs;
        return view('jobs.index', [
            'jobs' => Job::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Create new Job
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job = Job::create($data);
        //Send email notify
        Mail::to($job->employer->user->email)->queue(
            new JobPosted($job)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });

        if (Auth::user()->cannot('edit-job', $job)) {
            abort(403);
        }
        if (Auth::guest()) {
            return redirect('/');
        }
        //Abort if current user is not who created job

        Gate::authorize('edit-job', $job);
        if (Gate::denies('edit-job', $job)) {
            abort(403);
        }
        if ($job->employer->user->isNot(Auth::user())) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        Gate::authorize('edit-job', $job);
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update($data);
        return redirect('/jobs/' . $job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);
        $job->delete();
        return redirect('/jobs');
    }
}
