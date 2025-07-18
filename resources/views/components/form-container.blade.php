@props(['title', 'action', 'method' => 'POST', 'enctype' => false, 'maxWidth' => '3xl'])

<div class="container mx-auto px-4 py-8">
    <div class="max-w-{{ $maxWidth }} mx-auto">
        <h1 class="text-2xl font-bold mb-6">{{ $title }}</h1>

        <form action="{{ $action }}" method="POST"
              @if($enctype) enctype="multipart/form-data" @endif
              {{ $attributes }}>
            @csrf
            @if(!in_array($method, ['GET', 'POST']))
                @method($method)
            @endif

            <div class="bg-white rounded-lg shadow p-6">
                {{ $slot }}
            </div>
        </form>
    </div>
</div>
