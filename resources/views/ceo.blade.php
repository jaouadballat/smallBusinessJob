@extends('base')

@section('content')
    <div class="container mb-5">
        <h1>Ceo Dashboard</h1>
        <form class="row" action="/">
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="company_name">Company name</label>
                    <input type="text" name="company_name" placeholder="Company name" class="single-input">
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
                    <input type="date" name="foundedAt" placeholder="Founded At" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" placeholder="Logo" class="single-input">
                </div>
            </div>
            <div class="col-md-12">
                <label for="about">About us</label>
                <textarea name="about" id="about" cols="30" rows="10"></textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1">Register</button>
        </form>
    </div>
@endsection

@section('scripts')
    tinymce.init({
        selector: '#about'
    });
@endsection
