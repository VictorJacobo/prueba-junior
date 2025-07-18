<x-app-layout>
    <div class="container mx-auto px-4 py-8 h-full">
        <x-notification />

        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h1 class="text-2xl font-bold">Gestión de Categorías</h1>
            <x-icon-button href="{{ route('categories.create') }}">
                Nueva Categoría
            </x-icon-button>
        </div>

        <x-search route="categories.index" :searchValue="$search" />

        <!-- Versión para desktop (se muestra en pantallas medianas y grandes) -->
        <div class="hidden md:block">
            <x-table :headers="['Nombre', 'Descripción', 'Imagen']">
                @foreach($categories as $category)
                <tr>
                    <td class="pl-5">{{ $category->name }}</td>
                    <td class="pl-5">{{ Str::limit($category->description, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($category->image_path)
                            <img src="{{ $category->image_path }}" alt="{{ $category->name }}" class="h-10 w-10 rounded-full object-cover">
                        @else
                            <span class="text-gray-400">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700 mr-3">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </x-table>
        </div>

        <!-- Versión para móvil (se muestra en pantallas pequeñas) -->
        <div class="md:hidden space-y-4">
            @foreach($categories as $category)
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg">{{ $category->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($category->description, 50) }}</p>
                    </div>
                    @if($category->image_path)
                        <img src="{{ $category->image_path }}" alt="{{ $category->name }}" class="h-10 w-10 rounded-full object-cover">
                    @endif
                </div>

                <div class="mt-3 flex space-x-3">
                    <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700 text-sm">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4 px-4 sm:px-0">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
