@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>My Messages</h1>
        @forelse($messages as $user => $msgs)
            <ul>
                <li class="font-weight-bold">
                    from: <a href="" class="text-danger">{{ \App\Models\Freelancer::name($user) }}</a>
                    <ul>
                        @forelse($msgs->groupBy('job_id') as $jobId => $messages)
                                <li><a href="{{route('agency.user.messages', ['user' => $user, 'job' => $jobId])}}" class="text-danger">{{ \App\Models\Job::find($jobId)->title }}</a></li>
                        @empty
                            no message
                        @endforelse
                    </ul>
                </li>
            </ul>
        @empty
            <p>No job yet</p>
        @endforelse
    </div>
@endsection

