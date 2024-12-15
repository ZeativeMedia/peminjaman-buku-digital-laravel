<x-dashboard.layouts title="Report Pinjaman">
    @role('admin')
    <section class="flex flex-col gap-5">
        <h1 class="font-bold text-xl">— Report Pinjaman</h1>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="divide-x">
                        <th>ID Buku</th>
                        <th class="px-20">Judul Buku</th>
                        <th>Stok Buku</th>
                        <th class="px-16">Status</th>
                        <th class="px-10">Nama Peminjam</th>
                        <th>Email Peminjam</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $i => $item)
                    <tr class="divide-x">
                        <td>{{ $item['book']['id'] }}</td>
                        <th>{{ $item['book']['title'] }}</th>
                        <td>{{ $item['book']['stock'] }}</td>
                        <th>{{ $item['status'] == 'borrowed' ? 'Di Pinjam' : 'Di Kembalikan' }}</th>
                        <th>{{ $item['user']['name'] }}</th>
                        <td>{{ $item['user']['email'] }}</td>
                        <td>{{ $item['borrow_date'] }}</td>
                        <td>{{ $item['return_date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endrole

    </x-dashboard-layouts>
