<x-layouts title="">
    <main class="flex flex-col justify-between w-full antialiased">

        <section class="mx-auto">
            <div class="text-gray-600 body-font">
                <div class="container px-5 py-10 mx-auto flex flex-wrap">
                    <div class="flex w-full mb-10 flex-wrap">
                        <h1 class="sm:text-3xl text-2xl font-bold leading-relaxed title-font text-gray-900 lg:w-1/2 lg:mb-0 mb-4">Peminjaman Buku <span class="text-red-500">Digital</span><br><span class="text-gray-400">Mudah dan Gratis.</span></h1>
                        <div class="lg:pl-6 lg:w-2/4 mx-auto flex flex-col">
                            <div class="h-1 mb-5 w-1/2 bg-red-500"></div>
                            <p class="leading-relaxed text-base">Sistem perpustakaan berbasis web yang memudahkan peminjaman dan pengembalian buku, dilengkapi dengan laporan detail, pengelolaan data, dan akses user-friendly untuk semua pengguna.</p>
                        </div>
                    </div>
                    @auth
                    <div class="flex w-full max-sm:gap-8 max-sm:flex-col justify-between items-center mb-24 mt-10 flex-wrap">
                        <img src="/me.png" class="size-72 drop-shadow-2xl flex-shrink-0" alt="">
                        <div class="flex flex-col gap-1 sm:w-1/2">
                            <h1 class="text-4xl font-bold leading-relaxed title-font text-gray-900">
                                Adri <span class="text-red-500">Pratama</span>
                            </h1>
                            <p class="text-2xl font-black text-gray-300">210101010121</p>
                            <p class="text-2xl font-black text-gray-500 uppercase mt-10">Pemrograman berbasis web</p>
                            <p class="text-2xl font-black text-gray-300 uppercase">Jurusan sistem informasi</p>
                            <p class="text-2xl font-black text-red-500 uppercase">SI 501</p>
                        </div>
                    </div>
                    @endauth
                    <div class="flex flex-wrap md:-m-2 -m-1 overflow-hidden rounded-[50px]">
                        <div class="flex flex-wrap w-1/2">
                            <div class="md:p-2 p-1 w-1/2">
                                <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://media.istockphoto.com/id/169993375/id/foto/rak-buku-di-dalam-perpustakaan-umum-stockholm.jpg?s=612x612&w=0&k=20&c=CQdtdcolghOfsFEWWsqEuK-UrFhIvuu5Qw1UwL57BFk=">
                            </div>
                            <div class="md:p-2 p-1 w-1/2">
                                <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://media.istockphoto.com/id/1085770318/id/foto/rak-buku-coklat-kayu-dengan-lampu.jpg?s=612x612&w=0&k=20&c=DbQKGWBytqzMxk_xliUkZxbqpYhOfj2R4vIuALxm8Eg=">
                            </div>
                            <div class="md:p-2 p-1 w-full">
                                <img alt="gallery" class="w-full h-full object-cover object-center block" src="https://media.istockphoto.com/id/1458679553/id/foto/sekelompok-siswa-sma-menggunakan-laptop-di-perpustakaan.jpg?s=612x612&w=0&k=20&c=6kDeIpaGf--PepN7lRGW4-Ex3sKTaxJPn8ro5F51W-I=">
                            </div>
                        </div>
                        <div class="flex flex-wrap w-1/2">
                            <div class="md:p-2 p-1 w-full">
                                <img alt="gallery" class="w-full h-full object-cover object-center block" src="https://media.istockphoto.com/id/1437365584/id/foto/perpustakaan-modern.jpg?s=612x612&w=0&k=20&c=__eBkpyJ1_P1ahrPNUUl5KDnFV3MD-_D7t0R_5wAVyg=">
                            </div>
                            <div class="md:p-2 p-1 w-1/2">
                                <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://media.istockphoto.com/id/1460007178/id/foto/perpustakaan-buku-buku-di-atas-meja-dan-latar-belakang-untuk-belajar-belajar-dan-penelitian-di.jpg?s=612x612&w=0&k=20&c=N9NrTxLpSdqhzyNkLgZTaKwjOzDbH1ds_e0mzJTK79c=">
                            </div>
                            <div class="md:p-2 p-1 w-1/2">
                                <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://media.istockphoto.com/id/910852368/id/foto/buku-pencarian-siswa.jpg?s=612x612&w=0&k=20&c=-6gt_Z1PN23Pquobax83on3DoGiEOGzmWkXDKAU1DS0=">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</x-layouts>
