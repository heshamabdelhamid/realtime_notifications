<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">

        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2 notifications" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16 @if (auth('admin')->user()->unreadnotifications->count() != 0) text-danger @endif "
                    id="notification-color"></span>

                <span class="dot dot-md text-danger" id="notification-counter">

                    @if (auth('admin')->user()->unreadnotifications->count() != 0)
                        {{ auth('admin')->user()->unreadnotifications->count() }}
                    @endif
                </span>
            </a>
        </li>

        {{-- Notification Modal --}}
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
            aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3" id="notification-modal">

                            @if (count(auth('admin')->user()->notifications) > 0)
                                @foreach (auth('admin')->user()->notifications as $notification)
                                    <div class="list-group-item">
                                        <div
                                            class="row align-items-center @if ($notification->unread()) bg-secondary @else bg-transparent @endif   ">

                                            <div class="col-auto">
                                                <span class="fe fe-box fe-24"></span>
                                            </div>

                                            <div class="col">
                                                <small><strong>{{ $notification->data['messages'] }}</strong></small>

                                                <div class="my-0 text-muted small">
                                                    {{ $notification->data['name'] }}
                                                </div>

                                                <small class="badge badge-pill badge-light text-muted">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </small>

                                            </div>

                                        </div>
                                    </div> <!-- / .list-group -->
                                @endforeach
                            @else
                                @lang('admin.not_found_data')
                            @endif
                            <!-- / .row -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                            All</button>
                    </div>
                </div>
            </div>
        </div>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('assets') }}/images/avatar.png" alt="Profile image"
                        class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent p-0 text-danger">
                        <span key="t-logout">{{ __('lang.logout') }}</span>
                    </button>
                </form>

            </div>
        </li>

    </ul>
</nav>
