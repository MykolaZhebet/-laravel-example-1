<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
