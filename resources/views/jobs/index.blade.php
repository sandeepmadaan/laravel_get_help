@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>List of Available jobs!</h1>
            <table>
            <tr>
                <th>Job Title</th>
                <th>Description</th>
                <th>Budget start amount</th>
                <th>Budget end amount</th>
                <th>User</th>
                <th>Category</th>
            </tr>
            @forelse($jobs as $job)
            <tr>
                <td>{{$job->title}}</td>
                <td>{{$job->description}}</td>
                <td>{{$job->budget_start_amount}}</td>
                <td>{{$job->budget_end_amount}}</td>
                <td>{{$job->user->name}}</td>
                <td>{{$job->category->name}}</td>
            </tr>
            @empty
                <p>No Jobs!</p>
            @endforelse
            </table>
        </div>
    </div>
</div>
@endsection