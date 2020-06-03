@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>apply for {{ $job->title }}</h1>
        </div>
        <form class="row" action="{{ route('freelancer.apply', ['id' => $job->id]) }}" method="post">
            @csrf
            @method('POST')
            <div class="col-md-12 my-3">
                <div class="mt-10">
                    <label for="resume">Resume</label>
                    <input type="file" name="resume" placeholder="Resume" class="single-input" >
                </div>
                <label for="message" class="mt-5">Cover Letter</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Apply</button>
        </form>
    </div>
@endsection

@section('scripts')
    tinymce.init({
        selector: '#message'
    });
@endsection
