<header class="topbar">

    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header" id="topnav-logo-container">


            @if(request('dashboard_section') == 'settings')
            <!--exist-->
            <div class="sidenav-menu-item exit-panel m-b-17">
                <a class="waves-effect waves-dark text-info" href="/home" id="settings-exit-button"
                    aria-expanded="false" target="_self">
                    <i class="sl-icon-logout text-info"></i>
                    <span id="settings-exit-text" class="font-14">{{ str_limit(__('lang.exit_settings'), 20) }}</span>
                </a>
            </div>
            @else
            <!--logo-->
            <div class="sidenav-menu-item logo m-t-0">
                <a class="navbar-brand" href="/home">
                    <img src="{{ runtimeLogoSmall() }}" alt="homepage" class="logo-small" />
                    <img src="{{ runtimeLogoLarge() }}" alt="homepage" class="logo-large" />
                </a>
            </div>
            @endif
        </div>


        <div class="navbar-collapse header-overlay" id="main-top-nav-bar">

            <div class="page-wrapper-overlay js-close-side-panels hidden" data-target=""></div>

            <ul class="navbar-nav mr-auto">

                <!--left menu toogle (hamburger menu) - main application -->
                @if(request('visibility_left_menu_toggle_button') == 'visible')
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark update-user-ux-preferences"
                        data-type="leftmenu" data-progress-bar="hidden" data-url=""
                        data-url-temp="{{ url('/') }}/{{ auth()->user()->team_or_contact }}/updatepreferences"
                        data-preference-type="leftmenu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                @endif


                <!--left menu toogle (hamburger menu) - settings section -->
                @if(request('visibility_settings_left_menu_toggle_button') == 'visible')
                <li class="nav-item settings-hamburger-menu hidden">
                    <a class="nav-link waves-effect waves-dark js-toggle-settings-menu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                @endif

                <!-- <li class="nav-item">
                <a class="nav-link waves-effect waves-dark font-22 p-t-10 p-r-10 js-toggle-notifications-panel"
                style="color:red !important"
                    href="javascript:void(0)"
                        id="PremiumPayment">
                <i class="ti-timer"></i> 01:42
                    </a>
                 
                </li> -->
                @if(auth()->user()->level == 'free' && !isset($nowIsPremium))
                <!-- <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark font-22 p-t-10 p-r-10 js-toggle-notifications-panel"
                        href="javascript:void(0)"
                        id="PremiumPayment">
                        <i class="sl-icon-trophy"></i> Updgrate $5 dll                   
                    </a>
                </li>         -->
                <script>
                $(document).on('click','#PremiumPayment', ()=> {
                    $.ajax({
                        url:'/createStripesession',
                        method: 'GET',
                        dataType: 'json',
                        data:{userId:'{{auth()->user()->id}}', 
                        userName:'{{auth()->user()->first_name}} {{auth()->user()->last_name}}',
                        userEmail:'{{auth()->user()->email}}'},
                        success: function (response) {
                            console.log(response);
                            const stripe = Stripe(response.publickey);                            
                            stripe.redirectToCheckout({
                            sessionId: response.id
                            });
                        },
                        error: function (error) {
                            console.error(error);
                        }
                });
            });
                </script>
                 @endif

                 @if(auth()->user()->level == 'premium' || isset($nowIsPremium))
                <!-- <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark font-22 p-t-10 p-r-10 js-toggle-notifications-panel"
                        href="javascript:void(0);" data-url="{{ url('events/topnav?eventtracking_status=unread') }}"
                        data-loading-target="sidepanel-notifications-body" data-target="sidepanel-notifications"
                        data-progress-bar='hidden' aria-expanded="false">
                        <i class="sl-icon-screen-smartphone"></i>
                        
                        Download App
                       
                    </a>
                </li> -->
                @endif
                <!--timer-->
                @if(auth()->user()->is_team && config('visibility.modules.timetracking'))
                <li class="nav-item dropdown hidden-xs-down my-timer-container {{ runtimeVisibility('topnav-timer', request('show_users_running_timer')) }}"
                    id="my-timer-container-topnav">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="timer-container"><i class="ti-timer font-18"></i>
                            <span class="my-timer-time-topnav" id="my-timer-time-topnav">{!!
                                clean(runtimeSecondsHumanReadable(request('users_running_timer'),
                                false)) !!}</span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <div class="active-timer-topnav" id="active-timer-topnav-container">
                            @if(request('users_running_timer_task'))
                            @include('misc.timer-topnav-details')
                            @else
                            <div class="x-heading">@lang('lang.active_timer')</div>
                            <div class="x-task">@lang('lang.task_not_found')</div>
                            <div class="x-button"><button type="button"
                                    class="btn waves-effect waves-light btn-sm btn-danger js-timer-button js-ajax-request timer-stop-button"
                                    data-url="{{ url('tasks/timer/stop?source=topnav') }}"
                                    data-form-id="tasks-list-table"
                                    data-progress-bar='hidden'>@lang('lang.stop_timer')</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </li>
                @endif



                <!--[UPCOMING] search icon-->
                <li class="nav-item hidden-xs-down search-box hidden">
                    <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-Magnifi-Glass2"></i>
                    </a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
            </ul>
       
        </div>
    </nav>


</header>