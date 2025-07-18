@props(['name', 'label', 'currentImage' => null, 'helpText' => 'Formatos soportados: JPG, PNG. Tamaño máximo: 2MB'])

<div class="mb-4" x-data="{ imagePreview: {{ $currentImage ? "'$currentImage'" : 'null' }} }">
    <label for="{{ $name }}" class="block text-gray-700 font-medium mb-2">{{ $label }}</label>

    <!-- Vista previa de la imagen -->
    <div x-show="imagePreview" class="mb-3">
        <img :src="imagePreview" alt="Vista previa" class="h-32 w-32 object-cover rounded-lg border">
    </div>

    <input type="file" name="{{ $name }}" id="{{ $name }}"
           @change="imagePreview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : {{ $currentImage ? "'$currentImage'" : 'null' }}"
           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

    @if($helpText)
        <p class="text-gray-500 text-sm mt-1">{{ $helpText }}</p>
    @endif

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    @if($currentImage)
        <div class="mt-2 flex items-center">
            <input type="checkbox" name="remove_image" id="remove_image"
                   @click="imagePreview = ''"
                   class="mr-2">
            <label for="remove_image" class="text-sm text-gray-700">Eliminar imagen actual</label>
        </div>
    @endif
</div>
