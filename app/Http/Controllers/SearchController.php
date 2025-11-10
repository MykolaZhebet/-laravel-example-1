<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $search = request('q');
        $jobs = Job::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('jobs.results', ['jobs' => $jobs]);
    }
}
