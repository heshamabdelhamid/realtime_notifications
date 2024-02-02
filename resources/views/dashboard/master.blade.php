<!doctype html>
<html lang="en">
@include('dashboard.partials.head')

<body class="vertical light ltr">
    <div class="wrapper">

        @include('dashboard.partials.header')

        @include('dashboard.partials.sidebar')

        <main role="main" class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>

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
                        <div class="modal-body" id="notification-modal">
                            <div class="list-group list-group-flush my-n3">

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

        </main>

    </div> <!-- .wrapper -->

    @include('dashboard.partials.scripts')
    @yield('scripts')
</body>

</html>
