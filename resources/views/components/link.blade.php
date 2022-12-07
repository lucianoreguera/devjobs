@php
    $classes = "text-sm text-gray-500 hover:text-gray-900"
@endphp

{{-- href lo porcesa en automatico ya que se lo paso como :href --}}
{{-- Si hubiera sido por ejemplo :link => en merge 'href' => $link --}}
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>