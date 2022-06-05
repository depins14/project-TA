<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
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
                        data: 'course.judul',
                        name: 'course.judul'
                    },
                    {
                        data: 'pertanyaan',
                        name: 'pertanyaan'
                    },
                    {
                        data: 'option1',
                        name: 'option1'
                    },
                    {
                        data: 'option2',
                        name: 'option2'
                    },
                    {
                        data: 'option3',
                        name: 'option3'
                    },
                    {
                        data: 'option4',
                        name: 'option4'
                    },
                    {
                        data: 'option5',
                        name: 'option5'
                    },
                    {
                        data: 'key',
                        name: 'key'
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
                <a href="{{ route('dashboard.question.create') }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded shadow-lg">+ Tambah Pertanyaan</a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="w-full table-auto">
                        <thead>
                            <th>ID</th>
                            <th>Materi</th>
                            <th>Pertanyaan</th>
                            <th>Pilihan 1</th>
                            <th>Pilihan 2</th>
                            <th>Pilihan 3</th>
                            <th>Pilihan 4</th>
                            <th>Pilihan 5</th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>
                        </thead>
                    </table>
                    <tbody></tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>