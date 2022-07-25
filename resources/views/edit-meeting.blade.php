<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            Editar Reunion
        </h2>
        <div class="flex">
            <x-search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('meetings.update', $meeting->id) }}">
                        @csrf
                        @method('PUT')
                        @include('components\form-meetings')
                        <div class="flex justify-end">
                            <a href="{{ route('meetings.show', $meeting->id) }}"
                                class="mt-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Ver Reunion
                            </a>
                            <a href="{{ route('add_guest', $meeting->id) }}"
                                class="mt-2 ml-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Editar Invitados
                            </a>
                            <a href="{{ route('add_file', $meeting->id) }}"
                                class="mt-2 ml-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Editar Archivos
                            </a>
                            <button type="submit" class="ml-2 mt-2 bg-indigo-900 text-white font-bold py-2 px-4 rounded-md">
                                Actualizar Reunion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>