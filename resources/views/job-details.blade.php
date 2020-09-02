@extends('base')

@section('content')

    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>
                                    @foreach($job->categories as $category)
                                        {{ $category->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <x-job :job="$job"></x-job>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>{{ $job->job_description }}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                                <p>
                                    {{ $job->skills }}
                                </p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                                <p>
                                    {{ $job->education }}
                                </p>
                                <p>
                                    {{ $job->experiences }}
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Posted date : <span>{{ $job->posted_date() }}</span></li>
                                <li>Location : <span>{{ $job->location }}</span></li>
                                <li>Job nature : <span>{{ $job->contract_type }}</span></li>
                                <li>Salary :  <span>{{ $job->salary() }} yearly</span></li>
                            </ul>
                            @if($freelancer->alreadyAppliedForThisJob($job->id))
                                <div class="apply-btn2">
                                    <a href="javascript:void(0)"
                                       class="btn">
                                        Already applied
                                    </a>
                                </div>
                            @else
                                <div class="apply-btn2">
                                    <a href="{{ route('freelancer.show', ['id' => $job->id]) }}"
                                       class="btn">
                                        Apply Now
                                    </a>
                                </div>

                            @endif
                        </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Company Information</h4>
                            </div>
                            <span>{{ $job->agency->name }}</span>
                            <p>I
                                {{ $job->agency->about }}
                            </p>
                            <ul class="p-0">
                                <li>Web : <span> {{ $job->agency->web }}</span></li>
                                <li>Email: <span>{{ $job->agency->email }}</span></li>
                                <li>Address: <span>{{ $job->agency->address }}</span></li>
                                <li>CEO: <span>{{ $job->agency->ceo->name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>

@endsection
