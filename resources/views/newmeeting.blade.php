<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            Nueva Reunion
        </h2>
        <div class="flex">
            <x-search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('meetings.store') }}">
                        @csrf
                        @include('components\form-meetings')
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 bg-gray-900 text-white font-bold py-2 px-4 rounded-md">
                                Crear Reunion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>