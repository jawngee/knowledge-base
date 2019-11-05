<!DOCTYPE html>
<html {{ language_attributes() }} lang="en">
    <head>
        @include('partials.analytics-header')
        <meta charset="{{ bloginfo( 'charset' ) }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="distribution" content="global" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#FC5047s">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        {{-- @header outputs the wordpress header stuff --}}
        @header
        {{-- Here you can use in your child templates to insert what you need in the <head> element. --}}
        @yield('head')
    </head>
    <body class="{{(getenv('WP_ENV')=='development') ? 'debug' : ''}} {{(!is_front_page()) ? 'other-page' : ''}} @yield('body-classes')">
        @include('partials.analytics-body')
        <div id="breakpoints"></div>
        {{-- Used for debugging css breakpoints --}}
        <div id="breakpoint-debug"></div>
        <header>
            <div class="contents">
                <div class="logo"><a href="/">@svg('logo-mc.svg')</a></div>
                <div class="nav">
                    <nav>
                        @flatmenu('primary')
                    </nav>
                    <a href="https://mediacloud.press/pricing" class="button">Purchase Now</a>
                </div>
                <a href="#" class="hamburger local">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </header>

        @yield('before-main')

        <main>
            @yield('main')
        </main>

        @yield('after-main')

        <footer>
            <div class="contents">
                <div class="mark">
                    <div class="logo">@svg('logo-mc.svg')</div>
                    <nav>
                        @flatmenu('social')
                    </nav>
                </div>
                <div class="primary">
                    <nav>
                        @menu('footer')
                    </nav>
                </div>
            </div>
            <div class="copyright">
                &copy; {{date('Y')}} interfacelab LLC, all rights reserved.
            </div>
        </footer>

        {{-- @footer outputs all the WordPress footer stuff --}}
        @footer

        {{-- If your templates need scripts output in the bottom of the page, they go in this section --}}
        @yield('scripts')
    </body>
</html>