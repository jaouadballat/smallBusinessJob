@extends('base')

@section('content')
    <div class="container">
        @foreach($messages as $message)
            <div class="d-flex align-items-center  ">
                <span class="mr-2">{{ auth()->user()->id === $message->user_id ? auth()->user()->name : \App\Models\Job::find($message->job_id)->agency->name }} </span> : {!! $message->body !!}</div>
        @endforeach
        <form action="{{ route('messages.send', ['jobId' => $jobId]) }}" method="post">
            @csrf
            @method('POST')
            <textarea name="body" class="form-control my-3" id="" cols="10" rows="10"></textarea>
            <button type="submit" class="btn btn-danger my-2">Submit</button>
        </form>
    </div>
@endsection
