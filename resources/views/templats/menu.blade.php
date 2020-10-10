<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('jobs.list') }}">Find a Jobs </a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @guest
                                <div class="header-btn f-right d-lg-block">
                                    <a href="{{ route('register') }}" class="btn head-btn1">Register</a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Login</a>
                                </div>
                            @endguest

                            @auth
                                <div class="main-menu">
                                    <nav class="d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="#">Profile</a>
                                                <ul class="submenu">
                                                    @ceo
                                                        @if(auth()->user()->hasRegisterAgency())
                                                            <li>
                                                                <a href="{{ route('agency.job.create') }}">Post a job</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('agency.jobs') }}">My jobs</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('agency.dashboard.update', ['id' => $agency->id]) }}">update profile</a>
                                                            </li>
                                                        @endif
                                                    @endceo

                                                    @freelancer
                                                    <li>
                                                        <a href="{{ route('freelancer.list') }}">My jobs</a>
                                                        <a href="{{ route('profile.show', ['id' => $freelancer->id]) }}">My Profile</a>
                                                        <a href="{{ route('freelancer.profile.edit', ['id' => $freelancer->id]) }}">Settings</a>
                                                    </li>
                                                    @endfreelancer

                                                    <li>
                                                        <a href="{{ route('logout') }}">logout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                @endauth
                        </div>
                    </div>
                    <!-- Mobile templats -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
