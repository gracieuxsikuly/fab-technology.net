<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createRealisationModal">
        <i class="bi bi-plus-lg me-1"></i> {{ __('app.add') }}
    </button>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="createRealisationModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if($isUpdate) {{ __('app.edit_info') }} @else {{ __('app.add_info') }} @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.designation') }}</label>
                        <select wire:model="designation" class="form-select">
                            <option value="">{{ __('app.select_option') }}</option>
                            @foreach($designationOptions as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('designation') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.number') }}</label>
                        <input wire:model.live="nombre" type="number" class="form-control" placeholder="{{ __('app.number') }}">
                        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="savereal" class="btn btn-primary">
                        <span wire:loading.remove wire:target="savereal">@if($isUpdate) {{ __('app.edit') }} @else {{ __('app.save') }} @endif</span>
                        <span wire:loading wire:target="savereal"><span class="spinner-border spinner-border-sm"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteRealisationModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog min-w-88">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">{{ __('app.delete_info') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('app.are_you_sure') }}</p>
                    <p class="text-danger fw-semibold">{{ __('app.delete_warning') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="destroy" class="btn btn-danger">{{ __('app.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>{{ __('app.designation') }}</th>
                            <th>{{ __('app.number') }}</th>
                            <th>{{ __('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reals as $real)
                        <tr>
                            <td>{{ $real->id }}</td>
                            <td>{{ $real->designation }}</td>
                            <td>{{ $real->nombre }}</td>
                            <td>
                                <button wire:click="edit({{ $real->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                <button wire:click="delete({{ $real->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">{{ __('app.no_data') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
