<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Job $job)
    {
        $jobs = Job::with(['employer', 'tags'])->latest()->paginate(2);
        // return $jobs;
        return response()->json([
            'message' => 'test message',
            'data' => $jobs
        ])->header('Test-header', 'test');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'body']);
        return response()->json([
            'id' => 1,
            'title' => $data['title'],
            'body' => $data['body']
        ])
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return  $job;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job = Job::findOrFail($id);
        $job->update($attributes);
        return $job;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response()->noContent();
    }
}
