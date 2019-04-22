<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Job;
use App\Category;

class JobController extends Controller {

    public function index() {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create() {
        $categories = Category::pluck('name', 'id');
        return view('jobs.create', compact('categories'));
    }

    public function store(JobRequest $request) {
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        Job::create($attributes);
        return redirect('/jobs');
    }
}