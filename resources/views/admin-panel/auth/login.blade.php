<!DOCTYPE html>
<html lang="id">

<head>
    @include('admin-panel.layouts.head')
</head>

<body class="bg-gradient-to-br from-green-100 to-green-200 min-h-screen flex items-center justify-center p-5">

    <!-- Kartu Login -->
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl border border-green-100">

        <!-- Icon & Brand -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo-omjasdun.png') }}" alt="Logo HijauKita" class="w-19 h-19 mx-auto">
            <h2 class="text-2xl font-bold mt-2 bg-gradient-to-r from-green-700 to-green-500 bg-clip-text text-transparent">Administrator</h2>
            <p class="text-gray-500 text-sm mt-1">Masuk ke sebagai Administrator</p>
        </div>

        <!-- Form Login -->
        <form action="{{ route('login.post') }}" method="POST" id="loginForm" class="space-y-5">
            @csrf
            <!-- Email -->
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-green-500 text-sm"></i>
                <input type="email" id="email" placeholder="Alamat email" name="email"
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-green-400 focus:ring-2 focus:ring-green-200 transition bg-gray-50 focus:bg-white">
            </div>

            <!-- Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-green-500 text-sm"></i>
                <input type="password" id="password" placeholder="Kata sandi" name="password"
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-green-400 focus:ring-2 focus:ring-green-200 transition bg-gray-50 focus:bg-white">
            </div>

            <!-- Opsi: Remember & Lupa -->
            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                    <input type="checkbox" id="remember" class="accent-green-500 w-4 h-4"> Ingat saya
                </label>
                <a href="#" id="forgotLink" class="text-green-600 hover:text-green-700 hover:underline">Lupa sandi?</a>
            </div>

            <!-- Tombol Login -->
            <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-semibold py-3 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-center gap-2">
                <span>Masuk</span>
                <i class="fas fa-arrow-right text-sm"></i>
            </button>
        </form>

        <!-- Pesan Notifikasi -->
        <div id="messageBox" class="mt-4 text-center text-sm py-2 rounded-lg hidden transition-all"></div>


        <!-- Link Register (simulasi) -->
        <div class="text-center text-sm text-gray-500 mt-5 pt-4 border-t border-gray-100">
            Belum punya akun?
            <a href="#" id="registerLink" class="text-green-600 font-semibold hover:underline">Daftar</a>
        </div>
    </div>

</body>

</html>