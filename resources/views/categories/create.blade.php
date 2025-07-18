<x-app-layout>
    <x-form-container title="Crear Nueva Categoría"
                      action="{{ route('categories.store') }}"
                      method="POST"
                      enctype
                      maxWidth="2xl"
                      x-data="{ imagePreview: null }">

        <!-- Nombre -->
        <x-input-field name="name" label="Nombre" value="{{ old('name') }}" required maxlength="100" />

        <!-- Descripción -->
        <x-input-field name="description" label="Descripción" type="textarea" value="{{ old('description') }}" />

        <!-- Imagen -->
        <x-image-upload name="image" label="Imagen" />

        <!-- Botones -->
        <x-form-actions cancelRoute="categories.index">
            Crear Categoría
        </x-form-actions>
    </x-form-container>
</x-app-layout>
