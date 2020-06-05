@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>My Jobs</h1>
        @forelse($jobs as $job)
            <x-job :job="$job"></x-job>
        @empty
            <p>No job yet</p>
        @endforelse
    </div>
@endsection

