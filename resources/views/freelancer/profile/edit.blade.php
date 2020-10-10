@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>{{ __('profile.header') }}</h1>
        </div>
        <form class="row" action="{{ route('freelancer.profile.update', ['id' => $freelancer->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="firstName">{{ __('profile.firstname') }}</label>
                    <input type="text" name="firstName" placeholder="{{ __('profile.firstname') }}" value="{{ $freelancer->firstName }}" class="single-input @error('firstName') is-invalid @enderror">
                    @error('firstName')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">{{ __('profile.lastname') }}</label>
                    <input type="text" name="lastName" placeholder="{{ __('profile.lastname') }}" value="{{ $freelancer->lastName }}"  class="single-input @error('lastName') is-invalid @enderror">
                    @error('lastName')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">{{ __('profile.email') }}</label>
                    <input type="text" name="email" placeholder="{{ __('profile.email') }}" value="{{ $freelancer->email }}"  class="single-input @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="lastName">{{ __('profile.title') }}</label>
                    <input type="text" name="title" placeholder="Web developer" value="{{ $freelancer->title }}"  class="single-input @error('title') is-invalid @enderror">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="phone">{{ __('profile.phone') }}</label>
                    <input type="text" name="phone" placeholder="+990290192" value="{{ $freelancer->phone }}"  class="single-input">
                </div>
                <div class="mt-10">
                    <button class="btn btn-danger" id="profile-resume" onclick="event.preventDefault(); uploadFile('resume');">{{ __('profile.resume') }}</button>
                    <span id="file-resume"></span>
                    <input type="file" name="profile-resume" id="resume" placeholder="resume" class="single-input" style="display: none">
                    @error('profile-resume')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="experiences_number">{{ __('profile.experiences') }}</label>
                    <input type="number" name="experiences_number" value="{{ $freelancer->experiences_number }}"  placeholder="{{ __('profile.experiences') }}" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="web">{{ __('profile.location') }}</label>
                    <input type="text" name="location" placeholder="Location" value="{{ $freelancer->location }}"  class="single-input @error('location') is-invalid @enderror">
                    @error('location')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="salary">{{ __('profile.salary') }}</label>
                    <input type="number" name="salary" placeholder="Salary" value="{{ $freelancer->salary }}"  class="single-input @error('salary') has-error @enderror">
                    @error('salary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10 wrapper">
                    <img src="{{ $freelancer->avatar() }}" id="image"/>
                    <div class="overly">
                        <button class="btn btn-danger" id="profile-image">{{ __('profile.upload') }}</button>
                    </div>
                    <input type="file" name="profile-avatar" id="avatar" value="{{ $freelancer->avatar() }}" placeholder="profile image" class="single-input" style="display: none">
                    @error('profile-avatar')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 my-3">
                <label for="about">{{ __('profile.about') }}</label>
                <textarea name="about" id="about" cols="30" rows="10">{{ $freelancer->about }}</textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="skills">{{ __('profile.skills') }}</label>
                <textarea name="skills" id="skills" cols="30" rows="10">{{ $freelancer->skills }}</textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="educations">{{ __('profile.education') }}</label>
                <textarea name="educations" id="educations" cols="30" rows="10">{{ $freelancer->educations }}</textarea>
            </div>
            <div class="col-md-12 my-3">
                <label for="experiences">{{ __('profile.experience') }}</label>
                <textarea name="experiences" id="experiences" cols="30" rows="10">{{ $freelancer->experiences }}</textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">{{ __('profile.upload') }}</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        tinymce.init({
            selector: '#skills'
        });

        tinymce.init({
            selector: '#educations'
        });

        tinymce.init({
            selector: '#experiences'
        });

        tinymce.init({
            selector: '#about'
        });

        let profileImage = document.getElementById('profile-image');


        profileImage.addEventListener('click', function(e) {
                let avatar = document.getElementById('avatar');
                e.preventDefault();
                avatar.click();
                avatar.addEventListener('change', function(e){
                    encodeImageFileAsURL(e.target);
                });
            });

        function encodeImageFileAsURL(element) {
            const file = element.files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById('image').src = reader.result
            }
            reader.readAsDataURL(file);
        }

        function uploadFile(fileName) {
            let avatar = document.getElementById(fileName);
            avatar.click();
            avatar.addEventListener('change', function(e){
                e.preventDefault();
                document.getElementById('file-' + fileName).textContent = e.target.files[0].name;
            });

        }
    </script>
@endsection
