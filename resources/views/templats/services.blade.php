<div class="our-services section-pad-t30">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>FEATURED TOURS Packages</span>
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
            @forelse($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="{{ route('jobs.list', ['category' => $category->name]) }}">{{ $category->name }}</a></h5>
                            <span>({{ $category->jobs->count() }})</span>
                        </div>
                    </div>
                </div>
            @empty
                <div>No Category yet</div>
            @endforelse
        </div>
        <!-- More Btn -->
        <!-- Section Button -->
        <div class="row">
            <div class="col-lg-12">
                <div class="browse-btn2 text-center mt-50">
                    <a href="job_listing.html" class="border-btn2">Browse All Sectors</a>
                </div>
            </div>
        </div>
    </div>
</div>
