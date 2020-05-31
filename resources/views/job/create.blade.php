@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>Post a job</h1>
        </div>
        <form class="row" action="{{ route('agency.job.create') }}" method="post">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="single-input @error('title') is-invalid @enderror">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="experiences_number">Number of experience</label>
                    <input type="number" name="experiences_number" placeholder="Experiences number" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="contract_type">Contract Type</label>
                    <select class="form-control" name="contract_type" id="contract_type">
                        <option value="cdi">CDI</option>
                        <option value="freelance">Freelance</option>
                        <option value="remote">Remote</option>
                        <option value="Full time">Full time</option>
                        <option value="Part time">Part time</option>
                    </select>
                    @error('contract_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 my-3">
                <label for="job_description">Description</label>
                <textarea name="job_description" id="job_description" cols="30" rows="10"></textarea>
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
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Post job</button>
        </form>
    </div>
@endsection

@section('scripts')
    tinymce.init({
    selector: '#job_description'
    });

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
