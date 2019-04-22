<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Proposal;

class ProposalController extends Controller {

    public function index() {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    // public function create() {
    //     $categories = Category::pluck('name', 'id');
    //     return view('jobs.create', compact('categories'));
    // }

    public function store(JobRequest $request) {
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        Proposal::create($attributes);
        return redirect('/proposals');
    }
}