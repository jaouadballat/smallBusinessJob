@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>Agency Dashboard</h1>

        <form class="row" action="{{ route('agency.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="name">Company name</label>
                    <input type="text" name="name" placeholder="Company name" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="web">Web</label>
                    <input type="text" name="web" placeholder="web" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="country">Country</label>
                    <input type="text" name="country" placeholder="country" class="single-input">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="city">City</label>
                    <input type="text" name="city" placeholder="city" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="address" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="foundedAt">Founded at</label>
                    <input type="number" min="1900" max="2099" step="1" name="foundedAt" placeholder="Founded At" class="single-input" />
                </div>
                <div class="mt-10">
                    <label for="company_logo">Logo</label>
                    <input type="file" name="company_logo" placeholder="Logo" class="single-input">
                </div>
            </div>
            <div class="col-md-12">
                <label for="about">About us</label>
                <textarea name="about" id="about" cols="30" rows="10"></textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Register</button>
        </form>
    </div>
@endsection

@section('scripts')
    tinymce.init({
        selector: '#about'
    });
@endsection
