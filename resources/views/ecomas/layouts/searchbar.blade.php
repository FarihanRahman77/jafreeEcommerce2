<div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
        <div class="canvas-wrapper">
            <header class="tf-search-head">
                <div class="title fw-5">
                    Search our site
                    <div class="close">
                        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                    </div>
                </div>
                <div class="tf-search-sticky">
                    <form class="tf-mini-search-frm"  action="{{route('search')}}" method="GET">
                        <fieldset class="text">
                            <input type="text"  class="" id="searchBar" name="search" placeholder="Search over 10,000 products" tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
              
            </header>
            <div class="canvas-body p-0">
                <div class="tf-search-content">
                    <div class="tf-cart-hide-has-results">
                        <div class="tf-col-content">
                            <div class="tf-search-content-title fw-5">Results</div>
                            <div class="tf-search-hidden-inner" id="searchSuggestions"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>