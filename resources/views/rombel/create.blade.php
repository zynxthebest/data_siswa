
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
        </h2>
    </x-slot>
    <x-content>
        <form method="post" action="{{ route('rombel.store') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="name" value="Nama Kelas" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{old ('name')}}" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <x-primary-button>
                simpan
            </x-primary-button>
        </form>
    </x-content>
    </div>
</x-app-layout>
