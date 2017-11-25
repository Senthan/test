<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.home.index') }}">
                Teaching Hospital Jaffna - Orthopedic Spinal Clinic(Unit 2)
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            @unless(auth()->guest())
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('staff*') ? 'active' : '' }}"><a href="{{ route('staff.index') }}"><i class="fa fa-btn fa-user"></i> Staff</a></li>
                {{--<li class="{{ request()->is('user*') ? 'active' : '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-btn fa-user"></i> Users</a></li>--}}
                <li class="{{ request()->is('patient*') ? 'active' : '' }}"><a href="{{ route('patient.index') }}"><i class="fa fa-btn fa-calendar-check-o"></i> Clinic visits</a></li>
{{--                <li class="{{ request()->is('add-non-surgical*') ? 'active' : '' }}"><a href="{{ route('non.surgical.index') }}"><i class="fa fa-btn fa-calendar-check-o"></i> Non Surgical</a></li>--}}
{{--                <li class="{{ request()->is('dose*') ? 'active' : '' }}"><a href="{{ route('dose.index') }}"><i class="fa fa-btn fa-medkit"></i> Drugs</a></li>--}}
{{--                <li class="{{ request()->is('treatment-template*') ? 'active' : '' }}"><a href="{{ route('treatment.template.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Surgery Templates</a></li>--}}
                <li class="{{ request()->is('event*') ? 'active' : '' }}"><a href="{{ route('event.index') }}"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
            </ul>
            @endunless
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>