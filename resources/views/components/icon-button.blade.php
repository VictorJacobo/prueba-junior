@props(['href' => '#'])

<a href="{{ $href }}" class='inline-flex items-center px-4 py-2 bg-buttons border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 justify-center cursor-pointer'>
    {{ $slot }}
</a>
