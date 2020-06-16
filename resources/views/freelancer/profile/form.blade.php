@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>Create your profile</h1>
        </div>
        <form class="row" action="" method="post">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" placeholder="First Name" class="single-input @error('firstName') is-invalid @enderror">
                    @error('firstName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" placeholder="Last Name" class="single-input @error('lastName') is-invalid @enderror">
                    @error('lastName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">Email</label>
                    <input type="text" name="email" placeholder="Email" class="single-input @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="experiences_number">Number of experience</label>
                    <input type="number" name="experiences_number" placeholder="Experiences number" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="web">Location</label>
                    <input type="text" name="location" placeholder="Location" class="single-input @error('location') is-invalid @enderror">
                    @error('location')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" placeholder="Salary" class="single-input @error('salary') has-error @enderror">
                    @error('salary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 my-3">
                <label for="skills">Skills</label>
                <textarea name="skills" id="skills" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="education">Education</label>
                <textarea name="education" id="education" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="experiences">Experiences</label>
                <textarea name="experiences" id="experiences" cols="30" rows="10"></textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Save</button>
        </form>
    </div>
@endsection

@section('scripts')

    tinymce.init({
    selector: '#skills'
    });

    tinymce.init({
    selector: '#education'
    });

    tinymce.init({
    selector: '#experiences'
    });
@endsection
