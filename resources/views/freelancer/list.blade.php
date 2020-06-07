@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>My Jobs</h1>
        @forelse($jobs as $job)
            <x-job :job="$job">
                <a href="{{ route('messages.show', ['jobId' => $job->id]) }}" class="text-primary">messages</a>
            </x-job>
        @empty
            <p>No job yet</p>
        @endforelse
    </div>
@endsection

