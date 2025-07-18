<x-app-layout>
    <x-form-container title="Crear Nuevo Producto"
                      action="{{ route('products.store') }}"
                      method="POST"
                      enctype
                      x-data="{ imagePreview: null }">

        <!-- Nombre -->
        <x-input-field name="name" label="Nombre" value="{{ old('name') }}" required maxlength="100" />

        <!-- Descripción -->
        <x-input-field name="description" label="Descripción" type="textarea" value="{{ old('description') }}" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <!-- Precio -->
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Precio *</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
                    <x-input-field name="price" label="" type="number"
                                 value="{{ old('price') }}"
                                 required step="0.01" min="0"
                                 class="pl-8" />
                </div>
            </div>

            <!-- Cantidad -->
            <x-input-field name="quantity" label="Cantidad en Stock" type="number"
                         value="{{ old('quantity') }}" required min="0" />
        </div>

        <!-- Categoría -->
        <x-input-field name="category_id" label="Categoría" type="select" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-input-field>

        <!-- Imagen -->
        <x-image-upload name="image" label="Imagen del Producto" />

        <!-- Botones -->
        <x-form-actions cancelRoute="products.index">
            Crear Producto
        </x-form-actions>
    </x-form-container>
</x-app-layout>
