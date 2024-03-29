@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>My Jobs</h1>
        @forelse($jobs as $job)
            <x-job :job="$job">
                <a href="{{ route('job.messages', ['id' => $job->id]) }}" class="text-danger">messages</a>
            </x-job>
        @empty
            <p>No job yet</p>
        @endforelse
    </div>
@endsection

