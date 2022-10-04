<main class="flex-shrink-0 pt-4">
    <div class="container mt-5">
        <div class="row">
            <div class="col-10">
                <h1>@yield('header-main')</h1>
                @include('main.blocks.messages')
                @yield('content-main')
            </div>
            <div class="col-2">
                @include('main.blocks.aside')
            </div>
        </div>
    </div>
</main>
