@if ($message = Session::get('success'))
    <div class="notification-bottom">
        <p class="alert alert-success">{{ $message }}</p>
        <span class="notification-close">X</span>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="notification-bottom">
        <p class="alert alert-error">{{ $message }}</p>
        <span class="notification-close">X</span>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="notification-bottom">
        <p class="alert alert-warning">{{ $message }}</p>
        <span class="notification-close">X</span>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="notification-bottom">
        <p class="alert alert-info">{{ $message }}</p>
        <span class="notification-close">X</span>
    </div>
@endif


@foreach ($errors->all() as $error)
    <div class="notification-bottom">
        <p class="alert alert-danger">{{ $error }}</p>
        <span class="notification-close">X</span>
    </div>
@endforeach


{{-- @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="notification-bottom">
                                <p class="alert alert-danger">{{ $error }}</p>
                                <span class="notification-close">X</span>
                            </div>
                        @endforeach
                    @endif
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="notification-bottom">
                                <p class="alert alert-danger">{{ $error }}</p>
                                <span class="notification-close">X</span>
                            </div>
                        @endforeach
                    @endif
                    @if (Session::has('message'))
                        <div class="notification-bottom">
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                            <span class="notification-close">X</span>
                        </div>
                    @endif --}}
