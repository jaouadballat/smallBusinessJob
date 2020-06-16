@inject('user','App\User')
@extends('base')

@section('content')
    <div class="container">
        @foreach($freelancer->messages()->where('job_id', $jobId)->get() as $message)
            <div class="d-flex align-items-center  ">
                <span class="mr-2 bold">{{ $user->whereId($message->from)->first()->name }}</span> : {!! $message->message !!}</div>
        @endforeach

        <form action="{{ route('agency.dashboard.messages', ['freelancerId' => $freelancerId, 'jobId' => $jobId]) }}" method="post">
            @csrf
            @method('POST')
            <textarea name="body" id="body" class="form-control my-3" id="" cols="10" rows="10"></textarea>
            <button type="submit" class="btn btn-danger my-2">Submit</button>
        </form>
    </div>
@endsection

@section('scripts')
    tinymce.init({
    selector: '#body'
    });
@endsection
