@extends('base')

@section('content')
    <div class="container">
        <h3>List of jobs</h3>
        @foreach($jobs as $job)
            <x-job :job="$job">
                <div class="mx-3">
                    <a href="{{ route('agency.job.update', ['id' => $job->id]) }}" class="text-warning">Edit</a>
                    <a href="job_details.html" class="text-danger">remove</a>
                </div>
            </x-job>
        @endforeach
    </div>
@endsection
