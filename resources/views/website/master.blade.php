<!DOCTYPE html>
    <html lang="en" dir="ltr">
        @include('website.includes.header')
        <body>
            <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content"></div>
                </div>
            </div>
            <div class="site">
                @include('website.includes.topnavbar')
                <div class="site__body">
                    @yield('content')   
                </div>
                @include('website.includes.footer')
            </div>
            @include('website.includes.script')
        </body>
    </html>