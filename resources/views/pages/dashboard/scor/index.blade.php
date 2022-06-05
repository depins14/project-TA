<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
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
                    }, {
                        data: 'user.name',
                        name: 'users.name'
                    },
                    {
                        data: 'course.judul',
                        name: 'course.judul'
                    },

                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.kd.create') }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded shadow-lg">+ Tambah KD</a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="col-span-4">

                </div>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="w-full table-auto">
                        <thead>
                            <th>ID</th>
                            <th>Siswa</th>
                            <th>Materi</th>
                            <th>Nilai</th>
                        </thead>
                    </table>
                    <tbody></tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>