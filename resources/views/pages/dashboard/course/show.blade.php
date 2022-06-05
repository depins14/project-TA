<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course &raquo; #{{ $course->id }} {{ $course->judul }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%'
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
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.course.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    < Back </a>
            </div>

            <div class="flex justify-between self-center">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Question Items</h2>

            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Soal</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Option 5</th>
                                <th>Key</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>