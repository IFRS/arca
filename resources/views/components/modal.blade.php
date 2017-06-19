<div class="modal fade" id="{{ $id or bcrypt(microtime()) }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">{{ $title or 'Modal' }}</h3>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                {{ $footer or '' }}
            </div>
        </div>
    </div>
</div>
