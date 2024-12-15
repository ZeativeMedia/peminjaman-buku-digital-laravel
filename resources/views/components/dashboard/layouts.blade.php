@php
$LIST_ADMIN_MENU = [
['modal' => 'modals_tambah_data_buku','icon' => 'plus', 'title' => 'Tambah Buku'],
['href' => '/dashboard/users','icon' => 'users', 'title' => 'Data User'],
['href' => '/dashboard/reports','icon' => 'book-copy', 'title' => 'Report Pinjaman'],
['href' => '/dashboard/users','icon' => 'users', 'title' => 'Data User'],
];
@endphp

<x-layouts :title="$title" class="p-5 gap-10">
    @if (session('success'))
    <div class="bg-success text-white px-4 py-2 rounded w-full">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-error text-white px-4 py-2 rounded w-full">
        {{ session('error') }}
    </div>
    @endif

    @role('admin')
    <section class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-5">
        @foreach ($LIST_ADMIN_MENU as $i => $item)
        <a href="{{ $item['href'] ?? '#' }}" onclick="{{ $item['modal'] ?? '' }}.showModal()" class="flex items-center cursor-pointer justify-center gap-3 p-5 font-semibold rounded-lg border {{ $i == 0 ? 'bg-gray-50' : 'bg-info text-white' }}">
            <x-dynamic-component :component="'lucide-' . $item['icon']" class="size-5 {{ $i == 0 ? 'stroke-red-500' : 'stroke-white' }}" />
            <h1>{{ $item['title'] }}</h1>
        </a>
        @endforeach
    </section>
    @endrole

    {{ $slot }}
</x-layouts>
