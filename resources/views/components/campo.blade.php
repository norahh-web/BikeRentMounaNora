{{--
    Campo de formulario: etiqueta + input (o textarea) + mensaje de error.
    Estados: normal, foco (:focus-visible), error (campo--error) y deshabilitado (atributo disabled).
    Uso:
      <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
               :valor="old('email')" placeholder="tucorreo@ejemplo.com"
               required autocomplete="username" />
    Los atributos extra (required, autofocus, autocomplete, placeholder, disabled...) van al input.
    El error se lee solo de $errors usando el name del campo.
--}}
@props([
    'nombre',
    'etiqueta',
    'tipo' => 'text',
    'id' => null,
    'valor' => null,
    'ayuda' => null,
])

@php
    $id = $id ?? $nombre;
    $mensajes = $errors->get($nombre);
    $hayError = count($mensajes) > 0;
    $idAyuda = $id . '-ayuda';
    $idError = $id . '-error';
    $describe = trim(($ayuda ? $idAyuda : '') . ' ' . ($hayError ? $idError : ''));
@endphp

<div class="campo{{ $hayError ? ' campo--error' : '' }}">
    <label class="campo__etiqueta" for="{{ $id }}">{{ $etiqueta }}</label>

    @if ($tipo === 'textarea')
        <textarea
            id="{{ $id }}"
            name="{{ $nombre }}"
            @if ($hayError) aria-invalid="true" @endif
            @if ($describe) aria-describedby="{{ $describe }}" @endif
            {{ $attributes->merge(['class' => 'campo__input campo__input--area', 'rows' => 5]) }}
        >{{ $valor }}</textarea>
    @else
        <input
            id="{{ $id }}"
            name="{{ $nombre }}"
            type="{{ $tipo }}"
            @if (! is_null($valor)) value="{{ $valor }}" @endif
            @if ($hayError) aria-invalid="true" @endif
            @if ($describe) aria-describedby="{{ $describe }}" @endif
            {{ $attributes->merge(['class' => 'campo__input']) }}
        >
    @endif

    @if ($ayuda)
        <p id="{{ $idAyuda }}" class="campo__ayuda">{{ $ayuda }}</p>
    @endif

    @if ($hayError)
        <p id="{{ $idError }}" class="campo__error">{{ $mensajes[0] }}</p>
    @endif
</div>