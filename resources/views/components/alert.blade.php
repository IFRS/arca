<div class="alert alert-{{ $status }}">
    {{ $slot }}
    @if (!isset($dismissable) || $dismissable)
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>
