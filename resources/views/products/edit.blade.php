<x-app-layout>
    <x-form-container title="Editar Producto: {{ $product->name }}" action="{{ route('products.update', $product) }}"
        method="PUT" enctype x-data="{ imagePreview: '{{ $product->image_path ?? '' }}' }">

        <!-- Nombre -->
        <x-input-field name="name" label="Nombre" value="{{ $product->name }}" required maxlength="100" />

        <!-- Descripción -->
        <x-input-field name="description" label="Descripción" type="textarea" value="{{ $product->description }}" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <!-- Precio -->

            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <span class="text-gray-500">$</span>
                </div>
                <x-input-field name="price" label="Precio" type="number"
                    value="{{ number_format($product->price, 2) }}" required step="0.01" min="0"
                    class="pl-10 w-full" />
            </div>

            <!-- Cantidad -->
            <x-input-field name="quantity" label="Cantidad en Stock" type="number" value="{{ $product->quantity }}"
                required min="0" />
        </div>

        <!-- Categoría -->
        <x-input-field name="category_id" label="Categoría" type="select" required>
            <option value="">Seleccione una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-input-field>

        <!-- Imagen -->
        <x-image-upload name="image" label="Imagen del Producto" :currentImage="$product->image_path" />

        <!-- Botones -->
        <x-form-actions cancelRoute="products.index">
            Actualizar Producto
        </x-form-actions>
    </x-form-container>
</x-app-layout>
