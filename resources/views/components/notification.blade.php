<div x-data="{ show: false, message: '', type: '' }"
     x-init="
        @if(session('success'))
            show = true;
            message = '{{ session('success') }}';
            type = 'success';
            setTimeout(() => show = false, 3000);
        @endif
        @if(session('status'))
            show = true;
            message = '{{ session('status') }}';
            // Determina el tipo basado en el contenido del mensaje
            type =
                @if(str_contains(session('status'), 'updated') || str_contains(session('status'), 'guardado'))
                    'success'
                @else
                    'info'
                @endif;
            setTimeout(() => show = false, 3000);
        @endif
        @if($errors->any()))
            show = true;
            message = '{{ $errors->first() }}';
            type = 'error';
            setTimeout(() => show = false, 3000);
        @endif
     "
     x-show="show"
     x-transition
     class="fixed top-4 right-4 px-6 py-4 rounded shadow-lg text-white z-50"
     :class="{
         'bg-green-500': type === 'success',
         'bg-red-500': type === 'error',
         'bg-blue-500': type === 'info'
     }">
    <span x-text="message"></span>
</div>
