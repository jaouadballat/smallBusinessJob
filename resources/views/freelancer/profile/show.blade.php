@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center flex-column">
                            <img src={{ asset($freelancer->avatar) }} class="img-thumbnail" alt="" style="max-width: 200px; max-height: 200px" >
                            <h1 class="text-danger m-0">{{ $freelancer->fullName()  }}</h1>
                            <h3 class="font-weight-bold m-0">{{ $freelancer->title }}</h3>
                            <p class="m-0">{{ $freelancer->email }}</p>
                        </div>
                        <div class="col-12">
                            <h2 class="text-danger"><ins>About:</ins></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam consequatur, dignissimos dolorem eum ex fuga iste iure, minima mollitia odit, praesentium quia ratione reprehenderit unde? Aut deserunt dolore earum eum hic incidunt ipsa laudantium libero nobis nostrum numquam, officia officiis possimus quis quod, repellendus sint sit, temporibus veniam voluptates!</p>
                        </div>
                        <div class="col-12">
                            <h2 class="text-danger"><ins>Experience:</ins></h2>
                            <p>{!! $freelancer->experiences ?: 'No experiences defined' !!}</p>
                        </div>
                        <div class="col-12">
                            <h2 class="text-danger"><ins>Education:</ins></h2>
                            <p>{!! $freelancer->educations ?: 'No education defined' !!}</p>
                        </div>
                        <div class="col-12">
                            <h2 class="text-danger"><ins>Skills:</ins></h2>
                            <p>{!! $freelancer->skills ?: 'No skills defined'!!}</p>
                        </div>
                        <div class="col-12">
                            <p><span class="font-weight-bold m-0">Salary: </span>{{ $freelancer->salary() }}/years</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
