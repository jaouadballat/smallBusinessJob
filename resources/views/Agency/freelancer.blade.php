@extends('base')

@section('content')
    <div class="container">
        <h3>List of freelancers</h3>
        <ul>
            @forelse($freelancers as $freelancer)
                <li>
                    <a href="{{ route('agency.dashboard.messages', ['freelancerId' => $freelancer->id, 'jobId' => $id]) }}" class="text-danger">{{ $freelancer->user()->first()->name }}</a>
                </li>
            @empty
                <p>no job yet</p>
            @endforelse
        </ul>

    </div>
@endsection
