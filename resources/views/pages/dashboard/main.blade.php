<x-dashboard.layouts title="Dashboard">
    @role('user')
    <section class="flex flex-col gap-5 {{ $borrowed->isEmpty() ? 'hidden' :'' }}">
        <h1 class="font-bold text-xl">— Belum Dikembalikan</h1>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-5">
            @foreach ($borrowed as $borrow)
            <div class="flex flex-col hover:drop-shadow-lg transition-all overflow-hidden font-semibold rounded-lg bg-gray-50 border">
                <img class="w-full h-auto rounded-b-xl" src="{{ asset('storage/' . $borrow->book->cover) }}" alt="Cover of {{ $borrow->book->title }}">

                <div class="p-2 flex flex-col gap-4 text-sm text-left h-full">
                    <h1 class="line-clamp-2 uppercase">{{ $borrow->book->title }}</h1>
                    <div class="flex items-center justify-between mt-auto">
                        <p class="text-gray-500">— {{$borrow->book->author }}</p>
                        <p class="flex items-center text-xs gap-1 text-blue-500">
                            Stock - {{ $borrow->book->stock }}
                        </p>
                    </div>

                    <button type="button" onclick="{{ 'modals_kembali_data_buku_'.$borrow->id }}.showModal()" class="btn btn-sm w-full btn-error text-white">Kembalikan</button>
                </div>
            </div>

            <dialog id="{{ 'modals_kembali_data_buku_'.$borrow->id }}" class="modal modal-bottom sm:modal-middle">
                <form method="POST" action="{{ route('transactions.return', $borrow->book->id) }}" class="modal-box">
                    @csrf
                    @method('PATCH')

                    <h3 class="text-lg font-bold border-b pb-3">Kembalikan Buku</h3>
                    <p class="mt-5">Apakah kamu yakin ingin mengembalikan buku <strong>{{ $borrow->book->title }}</strong>?</p>

                    <div class="modal-action flex gap-2">
                        <button type="button" onclick="{{ 'modals_kembali_data_buku_'.$borrow->id }}.close()" class="btn btn-sm btn-error text-white">Batalkan</button>
                        <button type="submit" class="btn btn-sm btn-info text-white">Kembalikan</button>
                    </div>
                </form>
            </dialog>
            @endforeach
        </div>
    </section>
    @endrole

    <section class="flex flex-col gap-5">
        @role('admin')
        <h1 class="font-bold text-xl">— Data Buku</h1>
        @endrole

        @role('user')
        <h1 class="font-bold text-xl">— Pinjam Buku</h1>
        @endrole

        <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-5">
            @foreach ($books as $book)
            <div class="flex flex-col hover:drop-shadow-lg transition-all overflow-hidden font-semibold rounded-lg bg-gray-50 border">
                <img class="w-full h-auto rounded-b-xl" src="{{ $book->cover_url }}" alt="Cover of {{ $book->title }}">
                <div class="p-2 flex flex-col gap-4 text-sm text-left h-full">
                    <h1 class="line-clamp-2 uppercase">{{ $book->title }}</h1>
                    <div class="flex items-center justify-between mt-auto">
                        <p class="text-gray-500">— {{$book->author }}</p>
                        <p class="flex items-center text-xs gap-1 text-blue-500">
                            Stock - {{ $book->stock }}
                        </p>
                    </div>
                    @role('admin')
                    <button onclick="{{ 'modals_edit_data_buku_'.$book->id }}.showModal()" class="btn btn-sm btn-info text-white">Edit Buku</button>
                    @endrole

                    @role('user')
                    @if ($book->stock > 0)
                    <button type="button" onclick="{{ 'modals_pinjam_data_buku_'.$book->id }}.showModal()" class="btn btn-sm btn-info text-white">Pinjam</button>
                    @else
                    <button type="button" class="btn btn-sm btn-disabled btn-info text-white">Stok Habis</button>
                    @endif
                    @endrole
                </div>
            </div>

            <dialog id="{{ 'modals_pinjam_data_buku_'.$book->id }}" class="modal modal-bottom sm:modal-middle">
                <form method="POST" action="{{ route('transactions.store') }}" class="modal-box">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="borrow_date" value="{{ now()->toDateString() }}">

                    <h3 class="text-lg font-bold border-b pb-3">Pinjam Buku</h3>
                    <p class="mt-5">Apakah kamu yakin ingin meminjam buku <strong>{{ $book->title }}</strong>?</p>

                    <div class="modal-action flex gap-2">
                        <button type="button" onclick="{{ 'modals_pinjam_data_buku_'.$book->id }}.close()" class="btn btn-sm btn-error text-white">Batalkan</button>
                        <button type="submit" class="btn btn-sm btn-info text-white">Pinjam</button>
                    </div>
                </form>
            </dialog>

            <dialog id="{{ 'modals_edit_data_buku_'.$book->id }}" class="modal modal-bottom sm:modal-middle">
                <form method="POST" action="{{  route('books.update', $book->id) }}" enctype="multipart/form-data" class="modal-box">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-bold border-b pb-3">Edit Data Buku</h3>

                    <div class="flex flex-col gap-3 mt-5">
                        <div class="flex flex-col gap-2">
                            <img id="coverPreview" class="w-40 h-full rounded-lg" src="{{ asset('storage/' . $book->cover) }}" alt="Cover Preview">
                            <p class="text-sm font-bold mt-2">— Pilih Cover Buku</p>
                            <input type="file" class="file-input file-input-bordered px-0 input-sm w-full" accept="image/*" name="cover" onchange="previewImage(event)" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sm font-bold mt-2">— Masukan Judul Buku</p>
                            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="input input-bordered input-sm w-full" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sm font-bold mt-2">— Masukan Author Buku</p>
                            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="input input-bordered input-sm w-full" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sm font-bold mt-2">— Masukan Tahun Rilis</p>
                            <input type="number" name="year_published" value="{{ old('year_published', $book->year_published) }}" class="input input-bordered input-sm w-full" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sm font-bold mt-2">— Masukan Stok Buku</p>
                            <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" class="input input-bordered input-sm w-full" required />
                        </div>
                    </div>

                    <div class="modal-action flex gap-2">
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warning text-white">Hapus Buku</button>
                        </form>
                        <button type="submit" class="btn btn-sm btn-info text-white">Update Buku</button>
                        <button type="button" onclick="{{ 'modals_edit_data_buku_'.$book->id }}.close()" class="btn btn-sm btn-error text-white">Batalkan</button>
                    </div>
                </form>
            </dialog>
            @endforeach
        </div>
    </section>
    </x-dashboard-layouts>
