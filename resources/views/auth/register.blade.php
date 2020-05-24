@extends('base')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @foreach($roles as $role)
            <div class="col-md-6 my-5">
                @include('templats.register-form', ['role' => $role])
            </div>
        @endforeach
    </div>
</div>
@endsection
