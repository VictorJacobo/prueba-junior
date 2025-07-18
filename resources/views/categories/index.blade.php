<x-app-layout>
    <div class="container mx-auto px-4 py-8 h-full">
        <x-notification />

        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h1 class="text-2xl font-bold">Gestión de Categorías</h1>
            <div class="flex space-x-1.5">
            <x-icon-button href="{{ route('categories.export') }}">
                Exportar Excel
            </x-icon-button>
            <x-icon-button href="{{ route('categories.create') }}"
                icon="<path fill-rule='evenodd' d='M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z' clip-rule='evenodd' />">
                Nueva Categoría
            </x-icon-button>
        </div>
        </div>

        <x-search route="categories.index" :searchValue="$search" />

        @if ($categories->isEmpty())
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <x-categorias-logo class="h-12 w-12 mx-auto text-gray-400" />
                <h3 class="mt-2 text-lg font-medium text-gray-900">No hay categorías registradas</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Comienza creando una nueva categoría para organizar tus productos.
                </p>
                <div class="mt-6">
                    <x-icon-button href="{{ route('categories.create') }}">Crear primera categoría</x-icon-button>
                </div>
            </div>
        @else
            <!-- Versión para desktop (se muestra en pantallas medianas y grandes) -->
            <div class="hidden md:block">
                <x-table :headers="['Nombre', 'Descripción', 'Imagen']">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="pl-5">{{ $category->name }}</td>
                            <td class="pl-5">{{ Str::limit($category->description, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($category->image_path)
                                    <img src="{{ $category->image_path }}" alt="{{ $category->name }}"
                                        class="h-10 w-10 rounded-full object-cover">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="text-blue-500 hover:text-blue-700 mr-3">Editar</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer"
                                        onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>

            <!-- Versión para móvil (se muestra en pantallas pequeñas) -->
            <div class="md:hidden space-y-4">
                @foreach ($categories as $category)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg">{{ $category->name }}</h3>
                                <p class="text-gray-600 text-sm mt-1">{{ Str::limit($category->description, 50) }}</p>
                            </div>
                            @if ($category->image_path)
                                <img src="{{ $category->image_path }}" alt="{{ $category->name }}"
                                    class="h-10 w-10 rounded-full object-cover">
                            @endif
                        </div>

                        <div class="mt-3 flex space-x-3">
                            <a href="{{ route('categories.edit', $category) }}"
                                class="text-blue-500 hover:text-blue-700 text-sm">Editar</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm"
                                    onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 px-4 sm:px-0">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
