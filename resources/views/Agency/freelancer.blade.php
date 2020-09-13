@extends('base')

@section('content')
    <div class="container">
        <h3>List of freelancers</h3>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    @forelse($freelancers as $freelancer)
                        <div class="card border border-danger rounded mb-5">
                            <img class="card-img-top" style="max-width: 100%; max-height: 200px" src="{{ asset($freelancer->avatar) }}" alt="{{ $freelancer->fullName() }}">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold m-0">{{ $freelancer->fullName() }}</h3>
                                <p class="card-text m-0 mb-2">{{ $freelancer->title }}</p>
                                <a href="{{ route('agency.dashboard.messages', ['freelancerId' => $freelancer->id, 'jobId' => $id]) }}" class="btn-xs btn-primary">Messages</a>
                                <a href="{{ route('profile.show', ['id' => $freelancer->id]) }}" class="btn-xs btn-primary">Profile</a>
                            </div>
                        </div>
                    @empty
                        <p>no message yet for this job</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
