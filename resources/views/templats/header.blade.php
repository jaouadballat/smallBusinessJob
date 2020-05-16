<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" style="background-image: url({{asset('img/hero/h1_hero.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1>Find the most exciting startup jobs</h1>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- form -->
                        <form action="{{ route('search.job') }}" method="POST" class="search-box">
                            @csrf
                            @method('POST')
                            <div class="input-form">
                                <input type="text" name="job_title" placeholder="Job Tittle or keyword">
                                @if($errors->has('job_title'))
                                    <div>{{ $errors->first('job_title') }}</div>
                                @endif
                            </div>
                            <div class="input-form">
                                <input type="text" name="location" placeholder="Job Location">
                                @if($errors->has('location'))
                                    <div>{{ $errors->first('location') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn">
                                Find job
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
