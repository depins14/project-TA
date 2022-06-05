<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('KD') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // Ajax DataTable
            var dataTable = $('#crudTable').DataTable({
                ajax: {
                    url: "{!! url()->current() !!}",
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%'
                    },
                    {
                        data: 'kd',
                        name: 'kd'
                    },
                    {
                        data: 'nama_kd',
                        name: 'nama_kd'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.kd.create') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded shadow-lg">+ Tambah KD</a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="w-full table-auto">
                        <thead>
                            <th>ID</th>
                            <th>KD</th>
                            <th>Nama KD</th>
                            <th>Aksi</th>
                        </thead>
                    </table>
                    <tbody></tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>