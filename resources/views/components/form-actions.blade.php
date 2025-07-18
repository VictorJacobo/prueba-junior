@props(['cancelRoute'])

<div class="flex justify-end space-x-4 mt-6">
    <a href="{{ route($cancelRoute) }}"
       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
        Cancelar
    </a>
    <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
        {{ $slot }}
    </button>
</div>
