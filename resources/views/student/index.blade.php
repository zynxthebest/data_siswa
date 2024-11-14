<x-app-layout>
    <x-slot name="header flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Data student
        </h2>
        <h1 class="text-end h-5 w-10">
            Create
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a  href="{{route('student.create')}}">
                        <x-secondary-button class="mb-2 p-3">
                        ambambah
                        </x-secondary-button>
                    </a>
                    <a  href="{{ url('/export-students') }}">
                        <x-secondary-button class="mb-2 p-3">
                        ambaport
                        </x-secondary-button>
                    </a>
                    <form action="{{ route('student.import.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="file">Pilih File Excel:</label>
                        <input type="file" name="file" id="file" required>
                        <x-secondary-button type="submit">Importmba</x-secondary-button>
                    </form>


                    <x-table>
                        <x-slot:thead>
                        <tr>

                            <th class="p-3">no</th>
                            <th class="p-3">Photo Siswa</th>
                            <th class="p-3">nis</th>
                            <th class="p-3">nama</th>
                            <th class="p-3">Gender</th>
                            <th class="p-3">Rombel Name</th>
                            <th class="p-3">Action</th>
                        </tr>
                        </x-slot>
                            @foreach ($students as $student)
                            <tr class="border-b">
                               <td class="p-3">{{$loop->iteration}}</td>
                               <td class="p-3">
                                @if($student
                                 -> photo)
                                <img class="rounded-full" src="{{ asset ('/storage/'.$student->photo) }}" width="80" alt="Ambambar">

                                @endif
                               </td>
                               <td class="p-3">{{$student->nis}}
                               <td class="p-3">{{$student->name}}
                               <td class="p-3">{{$student->gender == "B" ? "Lanang" : "Wadon"}}
                                <td class="p-3">{{$student->rombel->name ?? "kelasnya ilang jir"}}

                               </td>
                               <td class="p-3"><a href="{{route('student.edit', $student->id)}}">
                                <x-secondary-button class="mb-2">ambadit</x-secondary-button>
                               </a>
                               <form method="post" action="{{ route('student.destroy', $student->id) }}" class="ms-2 inline">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>
                                    ambapus
                                </x-primary-button>
                            </form>
                            </td>
                            </tr>
                        @endforeach



                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
