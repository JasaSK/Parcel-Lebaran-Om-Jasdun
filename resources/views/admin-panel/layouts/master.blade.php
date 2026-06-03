<!DOCTYPE html>
<html lang="id">

@include('admin-panel.layouts.head')

<body class="bg-jasdun-cream text-slate-800 font-body">
    @include('admin-panel.layouts.nav')
    <main class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-7xl px-5 py-8 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[260px_1fr]">

                @include('admin-panel.layouts.sidebar')
                @yield('content')
            </div>
        </div>
    </main>
    @include('admin-panel.layouts.footer')
</body>

</html>