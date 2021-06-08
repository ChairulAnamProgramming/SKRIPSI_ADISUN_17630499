@include('templates.includes.header')
<div id="app">
    <div class="main-wrapper">
        @include('templates.includes.navbar')
        @include('templates.includes.sidebar')


        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{$title}}</h1>
                </div>

                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('templates.includes.footer')
    </div>
</div>
@include('templates.includes.script')
<!-- Page Specific JS File -->
</body>

</html>