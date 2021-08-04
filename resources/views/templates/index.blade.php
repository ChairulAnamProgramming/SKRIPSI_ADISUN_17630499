@include('templates.includes.header')
<div id="app">
    <div class="main-wrapper">
        @include('templates.includes.navbar')
        @include('templates.includes.sidebar')


        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @if ($title ==='')
                @else
                <div class="section-header">
                    <h1>{{$title}}</h1>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                @if (session('danger'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{session('danger')}}</strong>
                </div>
                @endif
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