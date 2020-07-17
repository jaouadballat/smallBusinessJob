@extends('base')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            <h1>Agency Dashboard</h1>
            <div class="header-btn mr-85">
                <a href="{{ route('agency.job.create') }}" class="btn head-btn2">Post a job</a>
            </div>
        </div>
        <form class="row" action="" method="post">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="single-input @error('title') is-invalid @enderror">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="web">Web</label>
                    <input type="text" name="web" placeholder="web" class="single-input">
                </div>
                <div class="mt-10">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email" class="single-input @error('email') has-error @enderror">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="country">Country</label>
                    <input type="text" name="country" placeholder="country" class="single-input @error('country') is-invalid @enderror"  value="{{ $agency->country }}">
                    @error('country')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <label for="city">City</label>
                    <input type="text" name="city" placeholder="city" class="single-input @error('city') is-invalid @enderror"  value="{{ $agency->city }}">
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="address" class="single-input @error('address') is-invalid @enderror"  value="{{ $agency->address }}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-10">
                    <label for="foundedAt">Founded at</label>
                    <input type="number" name="foundedAt" placeholder="Founded At" class="single-input @error('foundedAt') is-invalid @enderror"  value="{{ $agency->foundedAt }}"/>
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
                <textarea name="about" id="about" cols="30" rows="10">{{ $agency->about }}</textarea>
            </div>
            <button class="ml-auto mt-5 btn head-btn1" type="submit">Update</button>
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
