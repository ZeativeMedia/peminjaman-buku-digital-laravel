<x-layouts title="Sign Up" class="my-auto">
    <form action="{{ route('auth.signup') }}" method="POST" class="flex flex-col mx-auto my-10">
        @csrf

        <div class="flex items-center gap-2 mx-auto bg-gray-50 border p-5 rounded-xl w-full justify-center">
            <h1 class="text-xl font-bold text-gray-400">Daftar</h1>
            <x-brand />
        </div>
        <p class="text-center max-w-xs mt-6">Pinjam Buku Jadi Lebih Mudah dan Teratur dengan Sistem Digital!</p>
        <div class="flex flex-col mt-10 gap-4">
            <div>
                <p class="text-sm mb-1">Masukan Nama</p>
                <input type="text" name="name" placeholder="Gus Miftah" class="input input-bordered w-full max-w-xs" />
                @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Masukan Email</p>
                <input type="email" name="email" placeholder="contoh@gmail.com" class="input input-bordered w-full max-w-xs" />
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Masukan Password</p>
                <input type="password" name="password" placeholder="xxxxxx" class="input input-bordered w-full max-w-xs" />
                @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <p class="text-sm mb-1">Konfirmasi Password</p>
                <input type="password" name="password_confirmation" placeholder="xxxxxx" class="input input-bordered w-full max-w-xs" />
                @error('password_confirmation')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2 w-full text-center">
                <button class="btn btn-md btn-error w-full text-white">Daftar</button>
                <p class="text-sm">Sudah punya akun? <a href="/auth/signin" class="text-red-500 underline">Masuk</a></p>
            </div>
        </div>
    </form>
</x-layouts>
