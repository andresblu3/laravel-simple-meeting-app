<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            Agregar Archivos
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
            <!-- display errors of the upload file -->
            @if ($errors->any())
                <div class="flex justify-between text-white shadow-inner rounded p-3 bg-gray-900 mb-4">
                    <p class="self-center">
                        {{ $errors->first() }}
                    </p>
                    <strong class="text-xl align-center cursor-pointer del_alert">&times;</strong>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl mb-4">Agregando Archivos para la reunion: <br><span
                            class="font-bold">{{ $meeting->title }}</span></h2>
                    <form action="{{ route('save_file', $meeting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="w-full block mb-2 border-1 border-gray-200 rounded-md" type="file"
                            name="file" id="file" required>
                        <div class="flex justify-end">
                            <a href="{{ route('meetings.show', $meeting->id) }}"
                                class="mt-2 mr-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Ir a la Reunion
                            </a>
                            <button type="submit" class="mt-2 bg-indigo-900 text-white font-bold py-2 px-4 rounded-md">
                                Subir Archivo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($meeting->files->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @foreach ($meeting->files as $file)
                            <div class="flex mb-2 justify-between border-1 border-b border-gray-200">

                                <a class="flex" href="{{ asset('files/' . $file->path) }}" target="_blank">
                                    {{ $file->path }}
                                </a>
                                <form action="{{ route('delete_file', [$meeting->id, $file->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex ml-2 bg-gray-900 text-white font-bold py-2 px-2 rounded-md"
                                        onclick="return confirm('¿Estas seguro de eliminar este archivo?')"
                                        >
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl mb-4">No hay archivos para la reunion: <br><span
                                class="font-bold">{{ $meeting->title }}</span></h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
