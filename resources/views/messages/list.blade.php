@inject('user','App\User')
@extends('base')

@section('content')
    <div class="container">
        @foreach($messages as $message)
            <div class="d-flex align-items-center  ">
                <span class="mr-2 bold">{{ $user->whereId($message->from)->first()->name }}</span> : {!! $message->message !!}</div>
        @endforeach

        <form action="{{ route('messages.send', ['id' => $jobId]) }}" method="post">
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
