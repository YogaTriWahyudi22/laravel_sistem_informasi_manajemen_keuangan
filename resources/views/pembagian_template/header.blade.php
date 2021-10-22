{{-- <div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo"><img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt=""></div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div> --}}
@if (Auth::user())
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="user-name">{{ Auth::user()->nama }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
