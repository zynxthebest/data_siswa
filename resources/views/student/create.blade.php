
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
        </h2>
        <a href="./"><x-primary-button class="p-3">ambahome</x-primary-button></a>
    </x-slot>
    <x-content>
        <form method="post" action="{{ route('student.store') }}" class="mt-6 space-y-6">
                enctype="multipart/form-data"


            @csrf
            <div>
                <x-input-label for="photo" value="photo_siswa" />
                <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" value="{{ old ('photo')}}" />
                <x-input-error class="mt-2" :messages="$errors->get('photo')" />
            </div>

            <div>
                <x-input-label for="nis" value="NIS" />
                <x-text-input id="nis" name="nis" type="text" class="mt-1 block w-full" value="{{ strval(substr($lastNIS, 0, strlen($lastNIS)- 1)) .(substr($lastNIS, strlen($lastNIS)- 1) + 1) }}" />
                <x-input-error class="mt-2" :messages="$errors->get('nis')" />
            </div>
            <div>
                <x-input-label for="name" value="Nama Murid" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{old ('name')}}" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="rombel" value="Rombel" />
              <select name="rombel_id" id="rombel">
                @foreach ($rombels as $r)
                    <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
              </select>
                <x-input-error class="mt-2" :messages="$errors->get('rombel_id')" />
            </div>
            <div>
                <x-input-label for="gender" value="gender"/>
                    <select name="gender" id="gender">
                        <option value="B">Lanang</option>
                        <option value="G">Wadon</option>
                    </select>

            </div>
            <x-primary-button>
                simpan
            </x-primary-button>
        </form>
    </x-content>
    </div>
</x-app-layout>
