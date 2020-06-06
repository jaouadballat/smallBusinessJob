@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>My Jobs</h1>
        @forelse($messages as $message)
            @foreach($message->jobs()->get() as $job)
                <x-job :job="$job">
                    <a href="" class="text-primary">message</a>
                </x-job>
            @endforeach
        @empty
            <p>No job yet</p>
        @endforelse
    </div>
@endsection

