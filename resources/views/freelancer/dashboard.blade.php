@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>Dashboard</h1>
            {{ dd(collect(\Illuminate\Support\Facades\Storage::drive('google')->listContents('', false))->where('name', 'jaouad')->first()) }}
            <img src="{{  }}" alt="">
        </div>

    </div>
@endsection

