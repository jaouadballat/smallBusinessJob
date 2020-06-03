<div class="single-job-items mb-30 flex-nowrap">
    <div class="job-items">
        <div class="company-img mr-2" style="width: 20%">
            <a href="{{ route('job-details', ['id' => $job->id]) }}"><img src="{{ asset($job->agency->logo) }}" alt="" style="width: 100%"></a>
        </div>
        <div class="job-tittle">
            <a href="{{ route('job-details', ['id' => $job->id]) }}"><h4>{{ $job->title }}</h4></a>
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
    {{ $slot }}

</div>
