@extends('base')

@section('content')
    <div class="container">
        <h3>List of jobs</h3>
        @forelse($jobs as $job)
            <x-job :job="$job">
                <div class="mx-3">
                    <a href="{{ route('agency.dashboard.freelancers', ['id' => $job->id]) }}" class="text-primary">Messages</a>
                    <a href="{{ route('agency.job.update', ['id' => $job->id]) }}" class="text-primary">Edit</a>
                    <a href="{{ route('agency.job.delete', ['id' => $job->id]) }}" class="text-danger">remove</a>
                </div>
            </x-job>
        @empty
            <p>no job yet</p>
        @endforelse
    </div>
@endsection
