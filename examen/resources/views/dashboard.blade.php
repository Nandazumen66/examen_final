<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <h5 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Gestión de Tareas y Categorías</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('tasks.index') }}" class="btn btn-primary mb-2">
                                    Ver Tareas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary mb-2">
                                    Ver Categorías
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tasks.create') }}" class="btn btn-success mb-2">
                                    Crear Nueva Tarea
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.create') }}" class="btn btn-success mb-2">
                                    Crear Nueva Categoría
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
