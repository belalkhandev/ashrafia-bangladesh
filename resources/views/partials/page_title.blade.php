<!-- page title -->
<section class="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title">@yield('page_title', $page_title)</h3>
            </div>
            <div class="col-md-6 text-right">
                <ul class="page-breadcrumbs">
                    <li><a href="{{ route('fr.home') }}">Home</a></li>
                    <li><i class="fas fa-caret-right"></i></li>
                    <li>@yield('page_title', $page_title)</li>
                </ul>
            </div>
        </div>
    </div>
</section>
