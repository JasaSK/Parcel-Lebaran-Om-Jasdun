<!DOCTYPE html>
<html lang="id">

@include('guest.layouts.head')

<body class="bg-jasdun-cream text-slate-800 font-body">
    @include('guest.layouts.nav')

    @yield('content')

    @include('guest.layouts.footer')

    @include('guest.layouts.script')
</body>

</html>