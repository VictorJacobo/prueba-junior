<x-app-layout>
    <x-form-container title="Editar Categoría: {{ $category->name }}"
                      action="{{ route('categories.update', $category) }}"
                      method="PUT"
                      enctype
                      maxWidth="2xl"
                      x-data="{ imagePreview: '{{ $category->image_path ?? '' }}' }">

        <!-- Nombre -->
        <x-input-field name="name" label="Nombre" value="{{ $category->name }}" required maxlength="100" />

        <!-- Descripción -->
        <x-input-field name="description" label="Descripción" type="textarea" value="{{ $category->description }}" />

        <!-- Imagen -->
        <x-image-upload name="image" label="Imagen" :currentImage="$category->image_path" />

        <!-- Botones -->
        <x-form-actions cancelRoute="categories.index">
            Actualizar Categoría
        </x-form-actions>
    </x-form-container>
</x-app-layout>
