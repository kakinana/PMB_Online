<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300">
                            <x-secondary-button type="button" onclick="window.location='{{ route('tambah-user') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded mb-4">+ Tambah User</x-secondary-button>
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-300">
                                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">No</th>
                                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Nama</th>
                                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Email</th>
                                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $u)
                                    <tr class="border-b border-gray-300">
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $u->name }}</td>
                                        <td class="px-4 py-2">{{ $u->email }}</td>
                                        <td class="px-4 py-2">
                                            <x-primary-button onclick="window.location='{{ route('edit-user', ['id' => $u->id]) }}'" >Edit</x-primary-button>
                                            <form action="{{ route('hapus-user', ['id' => $u->id]) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Tidak ada data user</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
