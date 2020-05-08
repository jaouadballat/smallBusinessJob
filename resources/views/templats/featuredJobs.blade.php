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
                    <x-job :job="$job"></x-job>
                @empty
                    <div>No jobs yet</div>
                @endforelse

                <!-- single-job-content -->
            </div>
        </div>
    </div>
</section>
