<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            {{ $meeting->title }}
        </h2>
        <div class="flex">
            <x-search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flex justify-between text-white shadow-inner rounded p-3 bg-gray-900 mb-4">
                    <p class="self-center">
                        {{ session('success') }}
                    </p>
                    <strong class="text-xl align-center cursor-pointer del_alert">&times;</strong>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                            <span class="font-bold block">Titulo de la Reunion:</span>
                            {{ $meeting->title }}
                        </p>
                        <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                            <span class="font-bold block">Fecha:</span>
                            {{ $meeting->start_date }} - {{ $meeting->end_date }}
                        </p>
                        <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                            <span class="font-bold block">Descripcion:</span>
                            {{ $meeting->description }}
                        </p>
                        <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                            <span class="font-bold block">Url:</span>
                            <a class="text-indigo-700" href="{{ $meeting->url }}" target="_blank">{{ $meeting->url }}</a>
                        </p>
                        <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                            <span class="font-bold block">Invitados:</span>
                            @if ($meeting->guests->count() > 0)
                                @foreach ($meeting->guests as $guest)
                                    <a class="text-indigo-700" target="_blank">{{ $guest->name }}</a>
                                @endforeach
                            @else
                                    <span class="text-indigo-700">No hay invitados</span>
                            @endif
                        </p>
                        @if ($meeting->files->count() > 0)
                            <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                                <span class="font-bold block">Archivos:</span>
                                @foreach ($meeting->files as $file)
                                    <a class="block text-indigo-700 mr-2" href="{{ asset('files/' . $file->path) }}" target="_blank">{{ $file->path }}</a>
                                @endforeach
                            </p>
                        @else
                            <p class="text-md mb-4 p-2 rounded-md" style="background-color: rgba(224, 200, 255, 0.2)">
                                <span class="font-bold block">Archivos:</span>
                                <span class="text-indigo-700 mr-2">No hay archivos</span>
                            </p>
                        @endif
        
                        <div class="flex justify-end">
                            <a href="{{ route('add_file', $meeting->id) }}" class="bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                <span class="font-bold block">Editar Archivos</span>
                            </a>
                            <a href="{{ route('add_guest', $meeting->id) }}"
                                class="ml-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Editar Invitados
                            </a>
                            <a href="{{ route('meetings.edit', $meeting->id) }}"
                                class="ml-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Editar Reunion
                            </a>
                            <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Estas seguro de eliminar la reunion?');" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>