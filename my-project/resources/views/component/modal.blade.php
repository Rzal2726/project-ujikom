<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="{{ $id }}-form">
                    @csrf
                    @foreach ($fields as $field)
                        <div class="mb-3">
                            <label for="{{ $field['id'] }}" class="form-label">{{ $field['label'] }}</label>
                            <input type="text"
                                   class="form-control"
                                   id="{{ $field['id'] }}"
                                   placeholder="{{ $field['placeholder'] }}"
                                   {{ isset($field['readonly']) && $field['readonly'] ? 'readonly' : '' }}>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                @isset($onSave)
                    <button type="button" class="btn btn-primary" onclick="{{ $onSave }}">Save</button>
                @endisset
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>