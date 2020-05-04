<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <!-- single-job-content -->
                @forelse($jobs as $job)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="{{$job->agency->logo}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html"><h4>{{ $job->title }}</h4></a>
                                <ul>
                                    <li>{{ $job->agency->name }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                    <li>{{ $job->salary() }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">{{ $job->contract_type }}</a>
                            <span>{{ $job->posted_date() }}</span>
                        </div>
                    </div>
                @empty
                    <div>No jobs yet</div>
                @endforelse

                <!-- single-job-content -->
            </div>
        </div>
    </div>
</section>
