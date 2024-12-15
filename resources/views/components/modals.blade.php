<dialog id="modals_tambah_data_buku" class="modal modal-bottom sm:modal-middle">
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="modal-box">
        @csrf
        <h3 class="text-lg font-bold border-b pb-3">Tambah Data Buku</h3>

        <div class="flex flex-col gap-3 mt-5">
            <div class="flex flex-col gap-2">
                <img id="coverPreview" class="w-40 h-full rounded-lg" src="#" alt="Cover Preview">
                <p class="text-sm font-bold mt-2">— Pilih Cover Buku</p>
                <input type="file" name="cover" class="file-input file-input-bordered px-0 input-sm w-full" accept="image/*" onchange="previewImage(event)" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">— Masukan Judul Buku</p>
                <input type="text" name="title" placeholder="Buku Pemograman Bahasa Golang Indonesia" class="input input-bordered input-sm w-full" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">— Masukan Author Buku</p>
                <input type="text" name="author" placeholder="Gus Miftah" class="input input-bordered input-sm w-full" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">— Masukan Tahun Rilis</p>
                <input type="number" name="year_published" placeholder="2024" class="input input-bordered input-sm w-full" required />
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-bold mt-2">— Masukan Stok Buku</p>
                <input type="number" name="stock" placeholder="100" class="input input-bordered input-sm w-full" required />
            </div>
        </div>

        <div class="modal-action">
            <button type="button" onclick="modals_tambah_data_buku.close()" class="btn btn-sm btn-error text-white">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-info text-white">Publikasi</button>
        </div>
    </form>
</dialog>

<script>
    const thumbnail = document.getElementById('coverPreview');
    thumbnail.style.display = 'none';

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            thumbnail.src = reader.result;
            thumbnail.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

</script>
