@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'maxlength' => null,
    'placeholder' => '',
])

<div class="mb-4">
    <x-input-label for="{{ $name }}">
        {{ $label }} @if ($required)
            *
        @endif
    </x-input-label>

    @if ($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2"
            @if ($required) required @endif>
            {{ $slot }}
        </select>
    @elseif($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" rows="3"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2"
            @if ($required) required @endif
            @if ($maxlength) maxlength="{{ $maxlength }}" @endif placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2"
            @if ($type === 'number') min="0" oninput="this.value = Math.abs(this.value)" @endif
            @if ($required) required @endif
            @if ($maxlength) maxlength="{{ $maxlength }}" @endif
            placeholder="{{ $placeholder }}">
    @endif

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
