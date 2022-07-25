<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            Escritorio
        </h2>
        <div class="flex">
            <x-search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flex justify-between text-white shadow-inner rounded p-3 bg-gray-900 mb-4">
                    <p class="self-center">
                        {{ session('success') }}
                    </p>
                    <strong class="text-xl align-center cursor-pointer del_alert">&times;</strong>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mx-auto">

                    <table class="mb-4">
                        <thead>
                            <tr class="bg-gray-900 text-white">
                                <th
                                    class="text-center px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th
                                    class="text-center px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">
                                    Titulo
                                </th>
                                <th
                                    class="text-center px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">
                                    Url de la reunion
                                </th>
                                <th
                                    class="text-center px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">
                                    Invitados
                                </th>
                                <th
                                    class="text-center px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        @foreach ($meetings as $meeting)
                            <tr class="border-b border-indigo-200 text-sm">
                                <td class="px-6 py-4 whitespace-no-wrap text-left">
                                    {{ $meeting->start_date }} - {{ $meeting->end_date }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <a href="{{ route('meetings.show', $meeting->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ $meeting->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <a href="{{ $meeting->url }}" target="_blank"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ $meeting->url }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <!-- verify if the meeting have guests -->
                                    @if ($meeting->guests->count() > 0)
                                    @foreach ($meeting->guests as $guest)
                                    <span
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ $guest->name }}
                                    </span>
                                    @endforeach
                                    @else
                                    <span class="text-indigo-600 hover:text-indigo-900">
                                        Aun no hay invitados
                                    </span>
                                    @endif
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm">
                                    <a href="{{ route('meetings.show', $meeting->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Ver
                                    </a>
                                    <a href="{{ route('meetings.edit', $meeting->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Editar
                                    </a>
                                    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Estas seguro de Eliminar esta reunion?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                    {{ $meetings->links() }}
                    <div class="flex justify-end mt-2">
                        @if (isset($meetings))
                        @if ($meetings->currentPage() > 1)
                            <a class="p-2 rounded-md bg-gray-900 text-white" href="{{ $meetings->previousPageUrl() }}">Anterior</a>
                        @endif

                        @if ($meetings->hasMorePages())
                            <a class="p-2 ml-2 rounded-md bg-gray-900 text-white" href="{{ $meetings->nextPageUrl() }}">Siguiente</a>
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
