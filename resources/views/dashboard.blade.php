<x-app-layout>
    <div class="py-6 md:py-12 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <!-- Header -->
                <div class="px-2">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">¡Bienvenido, {{ auth()->user()->name ?? 'Usuario' }}!</h1>
                    <p class="text-gray-600 mt-1 sm:mt-2">Aquí tienes un resumen de tu dashboard de gestión</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Stat 1: Total Productos -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 sm:p-6 transition-all duration-300 hover:shadow-md">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Total Productos</h3>
                            <svg class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="mt-2">
                            <div class="text-2xl font-bold text-gray-900">{{ $totalProducts }}</div>
                            <p class="text-xs text-gray-500 mt-1">Productos registrados</p>
                        </div>
                    </div>

                    <!-- Stat 2: Categorías -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 sm:p-6 transition-all duration-300 hover:shadow-md">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium text-gray-500">Categorías</h3>
                            <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div class="mt-2">
                            <div class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</div>
                            <p class="text-xs text-gray-500 mt-1">Categorías activas</p>
                        </div>
                    </div>

                    <!-- Puedes agregar más stats cards aquí si lo necesitas -->
                </div>

                <!-- Charts Section - Solo se muestra si hay productos -->
                @if($totalProducts > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Gráfico de productos por categoría -->
                    <div class="bg-white p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Productos por categoría</h3>
                        <div class="relative h-64 sm:h-80">
                            <canvas id="productsByCategoryChart"
                                    data-chart-data="{{ json_encode($productsByCategoryData) }}"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico de precio promedio por categoría -->
                    <div class="bg-white p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Precio promedio por categoría</h3>
                        <div class="relative h-64 sm:h-80">
                            <canvas id="avgPriceByCategoryChart"
                                    data-chart-data="{{ json_encode($avgPriceByCategoryData) }}"></canvas>
                        </div>
                    </div>
                </div>
                @else
                <!-- Mensaje cuando no hay productos -->
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gray-100">
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="mt-3 text-lg font-medium text-gray-900">No hay productos registrados</h3>
                    <p class="mt-2 text-sm text-gray-500">Comienza agregando productos para ver estadísticas y gráficos.</p>
                    <div class="mt-4">
                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Agregar primer producto
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @if($totalProducts > 0)
        @vite(['resources/js/dashboard-charts.js'])
    @endif
</x-app-layout>
