@props(['name', 'label', 'type' => 'text', 'value' => '', 'required' => false, 'maxlength' => null, 'placeholder' => '', 'options' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 font-medium mb-2">
        {{ $label }} @if($required) * @endif
    </label>

    @if($type === 'select' && $options)
        <select name="{{ $name }}" id="{{ $name }}"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                @if($required) required @endif>
            {{ $slot }}
        </select>
    @elseif($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" rows="3"
                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  @if($required) required @endif
                  @if($maxlength) maxlength="{{ $maxlength }}" @endif
                  placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
               value="{{ old($name, $value) }}"
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
               @if($required) required @endif
               @if($maxlength) maxlength="{{ $maxlength }}" @endif
               placeholder="{{ $placeholder }}">
    @endif

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
