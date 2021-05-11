<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            {{-- <a href="#" class="simple-text logo-mini">KA</a> --}}
            <a href="#" class="simple-text logo-normal"></a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard' ) class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            
            @if (Auth::user()->name == 'Admin Admin')
            <li @if ($pageSlug ?? '' == 'department') class="active " @endif>
                <a href="/department">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>Department</p>
                </a>
            </li> 
            <li @if ($pageSlug ?? '' == 'course') class="active " @endif>
                <a href="/course">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>Course</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'student') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>Student</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'payment') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>Payment</p>
                </a>
            </li>
           
{{--             
            <li @if ($pageSlug ?? ''  == 'ads') class="active " @endif>
                <a href="{{ route('pages.ads') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Create Ad</p>
                </a>
            </li> --}}
           
            @endif
            
            <li @if ($pageSlug ?? '' == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Profile Setting</p>
                </a>
            </li>
            @if (Auth::user()->name != 'Admin Admin' && Auth::user()->status !=null)
            {{-- <li @if ($pageSlug ?? '' == 'proof') class="active " @endif>
                <a href="/proof">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>Upload proof of advert</p>
                </a>
            </li> --}}
            <li @if ($pageSlug ?? '' == 'course') class="active " @endif>
                <a href="/my-course">
                    <i class="tim-icons icon-money-coins"></i>
                    <p>My Courses</p></p>
                </a>
            </li>
            @endif
                  </ul>
    </div>
</div>
