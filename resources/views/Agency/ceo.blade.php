@extends('base')

@section('content')
    <div class="container mb-5">
        @if(session('create_agency_warning'))
            <span class="alert alert-warning d-block">{{ session('create_agency_warning') }}</span>
        @endif
        <h1>Agency Dashboard</h1>
        <form class="row" action="{{ route('agency.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="name">Company name</label>
                    <input type="text" name="name" placeholder="Company name" class="single-input @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="web">Web</label>
                    <input type="text" name="web" placeholder="web" class="single-input"  value="{{ old('web') }}">
                </div>
                <div class="mt-10">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email" class="single-input @error('email') has-error @enderror"  value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="country">Country</label>
                    <input type="text" name="country" placeholder="country" class="single-input @error('country') is-invalid @enderror"  value="{{ old('country') }}">
                    @error('country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="city">City</label>
                    <input type="text" name="city" placeholder="city" class="single-input @error('city') is-invalid @enderror"  value="{{ old('city') }}">
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="address" class="single-input @error('address') is-invalid @enderror"  value="{{ old('address') }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="foundedAt">Founded at</label>
                    <input type="number" name="foundedAt" placeholder="Founded At" class="single-input @error('foundedAt') is-invalid @enderror"  value="{{ old('foundedAt') }}"/>
                    @error('foundedAt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="company_logo">Logo</label>
                    <input type="file" name="company_logo" placeholder="Logo" class="single-input" >
                </div>
            </div>
            <div class="col-md-12">
                <label for="about">About us</label>
                <textarea name="about" id="about" cols="30" rows="10">{{ old('about') }}</textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Register</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        tinymce.init({
        selector: '#about'
    });

    </script>
@endsection
