@extends('base')

@section('content')
    <div class="container">
        <h3>List of jobs</h3>
        @forelse($jobs as $job)
            <x-job :job="$job">
                <div class="mx-3 d-flex flex-column">
                    <a href="{{ route('agency.job.update', ['id' => $job->id]) }}" class="text-primary mb-1">Edit</a>
                    <a href="{{ route('agency.dashboard.freelancers', ['id' => $job->id]) }}" class="text-primary mb-1">Messages</a>
                    <a href="{{ route('agency.job.delete', ['id' => $job->id]) }}" class="text-danger">remove</a>
                </div>
            </x-job>
        @empty
            <p>no job yet</p>
        @endforelse
    </div>
@endsection
