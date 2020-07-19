@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>apply for {{ $job->title }}</h1>
        </div>
        <form class="row" action="{{ route('freelancer.apply', ['id' => $job->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-12 my-3">
                <div class="mt-10">
                    <button class="btn btn-danger" id="resume">Upload resume</button>
                    <span id="file-name"></span>
                    <input type="file" name="cv" id="cv" placeholder="Resume" class="single-input" style="display: none">
                    @error('cv')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <label for="body" class="mt-5">Cover Letter</label>
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Apply</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        tinymce.init({
        selector: '#body'
    });

    document.getElementById('resume')
        .addEventListener('click', function(e) {
            let cv = document.getElementById('cv');
            e.preventDefault();
            cv.click();
            cv.addEventListener('change', function(e){
                document.getElementById('file-name').textContent = e.target.files[0].name;
            });
        });

    </script>
@endsection
