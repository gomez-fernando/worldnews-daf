{{-- mostramos mensaje de exito en la actalizacion --}}
@if (session('message'))
    @if (session('status') == 'error')
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @else ()
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- <div class="alert alert-success">
        {{ session('message') }}
    </div> -->
@endif

{{-- añadir tambien un mensaje de alert danger --}}
