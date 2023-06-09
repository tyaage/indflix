@extends('layouts.main')
@section('container')
    <div class="w-full mx-auto max-w-screen-xl bg-gray-100 shadow-sm p-5">
        <h1 class="text-3xl font-bold mb-10 pt-12 pt-48 lg:pt-32">Pengaturan</h1>
        <div class="flex justify-center">

            <div>
                <a href="/" class="mr-2">
                    <button class="px-4 py-2 mb-4 bg-cstmdark text-white rounded-md hover:bg-cstmlightdark font-semibold">
                        Kembali
                    </button>
                </a>

                <hr class="my-5 border-gray-500">

                <div class="form-container mt-8">
                    <!-- Menampilkan pesan sukses -->
                    @if (session('profile-success'))
                        <div class="bg-green-100 text-green-800 py-2 px-4 mb-4 rounded">
                            {{ session('profile-success') }}
                        </div>
                    @endif
                    <h1 class="text-2xl font-semibold my-5">Update Profile</h1>
                    <form method="POST" action="/ubah-profile">
                        @csrf
                        <label for="name" class="mb-1">Name</label>
                        <input type="text" name="name" id="name" value="{{ session('user')['name'] }}"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.name') ? '' : 'mb-4' }}">

                        <label for="email" class="mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ session('user')['email'] }}"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.email') ? '' : 'mb-4' }}">
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.email.0') }}</p>
                        @endif

                        <label for="gender" class="mb-1">Gender</label>
                        <select name="gender" id="gender"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.gender') ? '' : 'mb-4' }}">
                            <option value="L" {{ session('user')['gender'] === 'L' ? 'selected' : '' }}>Male</option>
                            <option value="P" {{ session('user')['gender'] === 'P' ? 'selected' : '' }}>Female</option>
                            @if (session()->has('error'))
                                <p class="text-red-500 text-sm mb-1">{{ session('error.gender.0') }}</p>
                            @endif
                        </select>

                        <label for="birth_year" class="mb-1">Birth Year</label>
                        <input type="number" name="birth_year" id="birth_year" value="{{ session('user')['birth_year'] }}"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.birth_year') ? '' : 'mb-4' }}">
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.birth_year.0') }}</p>
                        @endif

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 font-semibold mt-5">Update</button>
                    </form>
                </div>

                <hr class="mt-10 mb-10 border-gray-500">
                <h1 class="text-2xl font-semibold my-5">Ubah Password</h1>
                <div class="form-container mt-8">
                    <!-- Menampilkan pesan sukses -->
                    @if (session('password-success'))
                        <div class="bg-green-100 text-green-800 py-2 px-4 mb-4 rounded">
                            {{ session('password-success') }}
                        </div>
                    @endif
                    <form method="POST" action="/ubah-password">
                        @csrf
                        <label for="current_password" class="mb-1">Password Lama</label>
                        <input type="password" name="current_password" id="current_password"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.current_password') ? '' : 'mb-4' }}">
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.current_password.0') }}</p>
                        @endif

                        <label for="new_password" class="mb-1">Password Baru</label>
                        <input type="password" name="new_password" id="new_password"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.new_password') ? '' : 'mb-4' }}">
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.new_password.0') }}</p>
                        @endif

                        <label for="new_password_confirmation" class="mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="w-full py-2 px-4 border rounded-lg {{ session()->has('error.new_password_confirmation') ? '' : 'mb-4' }}">
                        @if (session()->has('error'))
                            <p class="text-red-500 text-sm mb-1">{{ session('error.new_password_confirmation.0') }}</p>
                        @endif

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 font-semibold mt-5 mb-10">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
