<!DOCTYPE html>
<html lang="en">
    <head>
        @include('commons.head')
        @yield('custom_head')
    </head>
    <body>
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
            @include('commons.top_nav')
            <!-- Container -->
            <div class="container">
                <!-- Notifications -->
                @include('notifications')
                <!-- ./ notifications -->
                <!-- Content -->
                @yield('content')
                <!-- ./ content -->
            </div>
            <!-- ./ container -->

            <!-- the following div is needed to make a sticky footer -->
            <div id="push"></div>
        </div>
        <!-- ./wrap -->
        @include('commons.footer')

        <!-- Javascripts================================================== -->
        @include('commons.js')
        @yield('scripts')
    </body>
</html>
