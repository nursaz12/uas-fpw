<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4">Data Mahasiswa</h3>

                    @if (session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Container untuk tombol tambah data dan search -->
                    <div class="mb-4 flex items-center justify-between">
                        <!-- Tombol Tambah Data -->
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                            <a href="{{ route('mahasiswa.mahasiswas') }}" class="block">Tambah Data Mahasiswa</a>
                        </button>

                        <!-- Form Search -->
                        <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Cari mahasiswa..." 
                                class="border border-gray-300 px-4 py-2 rounded-l focus:outline-none">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">
                                Cari
                            </button>
                        </form>     
                    </div>

                    <!-- Tabel Data Mahasiswa -->
                    <table class="table-auto w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 text-center">No</th>
                                <th class="border px-4 py-2">NPM</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Prodi</th>
                                <th class="border px-4 py-2 text-center">Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa as $key => $item)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $item->npm }}</td>
                                    <td class="border px-4 py-2">{{ $item->nama }}</td>
                                    <td class="border px-4 py-2">{{ $item->prodi }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="inline-block" 
                                            onsubmit="return confirm('Serius mau apus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 mx-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
        <tr>
            <td colspan="5" class="text-center border px-4 py-2">Data tidak ditemukan.</td>
        </tr>
    @endforelse
</tbody>

                    </table>
                    <div class="mt-4">
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
