<x-app-layout>
    <div class="container mx-auto px-4 py-8 h-full">
        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h1 class="text-2xl font-bold">Gestión de Productos</h1>
            @if($categories->isNotEmpty())
                <x-icon-button href="{{ route('products.create') }}">
                    Nuevo Producto
                </x-icon-button>
            @else
                <div class="relative group inline-block" title="Primero debe crear al menos una categoría">
                    <x-icon-button disabled href="#">
                        Nuevo Producto
                    </x-icon-button>
                </div>
            @endif
        </div>


        <x-search route="products.index" :searchValue="$search" />

        @if($products->isEmpty())
            <div class="bg-white p-8 rounded-lg shadow text-center text-gray-400">
                <x-productos-logo class="h-12 w-12 mx-auto"/>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No hay productos registrados</h3>
                <p class="mt-1 text-sm text-gray-500">
                    @if($categories->isNotEmpty())
                        Comienza creando un nuevo producto.
                    @else
                        No puedes crear productos hasta que tengas al menos una categoría registrada.
                    @endif
                </p>
                <div class="mt-6">
                    @if($categories->isNotEmpty())
                    <x-icon-button href="{{ route('products.create') }}">Crear primer producto</x-icon-button>
                       
                    @else
                    <x-icon-button href="{{ route('categories.create') }}">Crear categoría</x-icon-button>

                    @endif
                </div>
            </div>
        @else
            <!-- Versión para desktop (se muestra en pantallas medianas y grandes) -->
            <div class="hidden md:block">
                <x-table :headers="['Nombre', 'Categoría', 'Precio', 'Stock', 'Imagen']">
                    @foreach($products as $product)
                    <tr>
                        <td class="pl-5">
                            <div class="font-medium text-gray-900">{{ $product->name }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($product->description, 30) }}</div>
                        </td>
                        <td class="pl-5">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="pl-5">
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td class="pl-5">
                            <span class="{{ $product->quantity > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->image_path)
                                <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <span class="text-gray-400">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-700 mr-3">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
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
                @foreach($products as $product)
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ Str::limit($product->description, 30) }}</p>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $product->category->name }}
                                </span>
                                <span class="font-medium">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                <span class="{{ $product->quantity > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                                    Stock: {{ $product->quantity }}
                                </span>
                            </div>
                        </div>
                        @if($product->image_path)
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-full object-cover">
                        @endif
                    </div>

                    <div class="mt-3 flex space-x-3">
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-700 text-sm">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4 px-4 sm:px-0">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
