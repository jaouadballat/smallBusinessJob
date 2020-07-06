@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>Create your profile</h1>
        </div>
        <form class="row" action="{{ route('freelancer.profile.update', ['id' => $freelancer->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" placeholder="First Name" value="{{ $freelancer->firstName }}" class="single-input @error('firstName') is-invalid @enderror">
                    @error('firstName')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" placeholder="Last Name" value="{{ $freelancer->lastName }}"  class="single-input @error('lastName') is-invalid @enderror">
                    @error('lastName')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">Email</label>
                    <input type="text" name="email" placeholder="Email" value="{{ $freelancer->email }}"  class="single-input @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="experiences_number">Number of experience</label>
                    <input type="number" name="experiences_number" value="{{ $freelancer->experiences_number }}"  placeholder="Experiences number" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="web">Location</label>
                    <input type="text" name="location" placeholder="Location" value="{{ $freelancer->location }}"  class="single-input @error('location') is-invalid @enderror">
                    @error('location')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" placeholder="Salary" value="{{ $freelancer->salary }}"  class="single-input @error('salary') has-error @enderror">
                    @error('salary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <button class="btn btn-danger" id="profile-image">Upload Your Image</button>
                    <span id="file-name"></span>
                    {{ $freelancer->avatar }}"
                    <input type="file" name="profile-image" id="avatar" value="{{ $freelancer->avatar }}" placeholder="profile image" class="single-input" style="display: none">
                    @error('profile-image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 my-3">
                <label for="skills">Skills</label>
                <textarea name="skills" id="skills" cols="30" rows="10">{{ $freelancer->skills }}</textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="educations">Education</label>
                <textarea name="educations" id="educations" cols="30" rows="10">{{ $freelancer->educations }}</textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="experiences">Experiences</label>
                <textarea name="experiences" id="experiences" cols="30" rows="10">{{ $freelancer->experiences }}</textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Update</button>
        </form>
    </div>
@endsection

@section('scripts')

    tinymce.init({
    selector: '#skills'
    });

    tinymce.init({
    selector: '#educations'
    });

    tinymce.init({
    selector: '#experiences'
    });

    document.getElementById('profile-image')
    .addEventListener('click', function(e) {
    let avatar = document.getElementById('avatar');
    e.preventDefault();
    avatar.click();
    avatar.addEventListener('change', function(e){
    document.getElementById('file-name').textContent = e.target.files[0].name;
    });
    });
@endsection
