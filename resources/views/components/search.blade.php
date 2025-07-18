@props(['route', 'searchValue' => ''])

<form action="{{ route($route) }}" method="GET" class="mb-6">
    <div class="flex max-w-md mx-auto">
        <input type="text" name="search" value="{{ $searchValue }}" placeholder="Buscar categorías..."
               class="bg-white px-4 py-2 border border-gray-300  rounded-l-lg w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500  transition-colors">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg flex items-center justify-center transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span class="sr-only">Buscar</span>
        </button>
    </div>
</form>
