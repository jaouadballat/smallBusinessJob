@extends('base')

@section('content')
    <div class="container">
        <h3>List of jobs</h3>
        @forelse($jobs as $job)
            <x-job :job="$job">
                <div class="mx-3">
                    <a href="{{ route('agency.job.update', ['id' => $job->id]) }}" class="text-primary">Edit</a>
                    <a href="job_details.html" class="text-danger">remove</a>
                </div>
            </x-job>
        @empty
            <p>no job yet</p>
        @endforelse
    </div>
@endsection
