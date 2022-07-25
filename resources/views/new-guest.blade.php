<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            Agregar Invitados
        </h2>
        <div class="flex">
            <x-search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flex justify-between text-white shadow-inner rounded p-3 bg-gray-900 mb-4">
                    <p class="self-center">
                        {{ session('success') }}
                    </p>
                    <strong class="text-xl align-center cursor-pointer del_alert">&times;</strong>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl mb-4">Agregando Invitados para la reunion: <br><span class="font-bold">{{ $meeting->title }}</span></h2>
                    <form method="POST" action="{{ route('save_guest', $meeting->id) }}">
                        @csrf
                        @include('components\form-guests')
                        <div class="flex justify-end">
                            <!-- go to the meeting page -->
                            <a href="{{ route('meetings.show', $meeting->id) }}"
                                class="mt-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Ir a la Reunion
                            </a>
                            <button type="submit" class="ml-2 mt-2 bg-indigo-900 text-white font-bold py-2 px-4 rounded-md">
                                Agregar Invitados
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            @if ($meeting->guests->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @foreach ($meeting->guests as $guest)
                            <div class="flex mb-2 justify-between border-1 border-b border-gray-200">
                                <h2 class="p-2">{{ $guest->name }}</h2>
                                
                                <form method="POST" action="{{ route('delete_guest', [$meeting->id, $guest->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded-md" onclick="return confirm('Estas seguro de eliminar el Invitado?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
