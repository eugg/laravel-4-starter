<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{Config::get('const.site.name')}}</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
            <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">{{trans('pages.users')}}</a></li>
            <li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">{{trans('pages.groups')}}</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Sentry::check())
        <li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}/{{ Session::get('userId') }}">{{ Session::get('email') }}</a></li>
        <li><a href="{{ URL::to('logout') }}">{{trans('users.logout')}}</a></li>
        @else
        <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="/login">{{trans('users.login')}}</a></li>

        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
<!-- ./ navbar -->
