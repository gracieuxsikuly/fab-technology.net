<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createServiceModal">
        <i class="bi bi-plus-lg me-1"></i> {{ __('app.add') }}
    </button>

    <div class="modal fade" id="createServiceModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if($isUpdate) {{ __('app.edit_info') }} @else {{ __('app.add_info') }} @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.title') }}</label>
                        <input wire:model.live="title" type="text" class="form-control" placeholder="{{ __('app.title') }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.description') }}</label>
                        <textarea wire:model.live="description" class="form-control" rows="8" placeholder="{{ __('app.description') }}"></textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.photo') }}</label>
                        <input wire:model.live="photo" type="file" class="form-control" accept="image/*">
                        @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="saveservice" class="btn btn-primary">
                        <span wire:loading.remove wire:target="saveservice">@if($isUpdate) {{ __('app.edit') }} @else {{ __('app.save') }} @endif</span>
                        <span wire:loading wire:target="saveservice"><span class="spinner-border spinner-border-sm"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteServiceModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">{{ __('app.delete_info') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('app.are_you_sure') }}</p>
                    <p>{{ __('app.delete_warning') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="destroy" class="btn btn-danger">{{ __('app.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr><th>#</th><th>{{ __('app.image') }}</th><th>{{ __('app.title') }}</th><th>{{ __('app.description') }}</th><th>{{ __('app.actions') }}</th></tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>
                                @if($service->image)
                                    <img src="{{ asset('assets/img/service/'.$service->image) }}" class="rounded" width="50" height="50" style="object-fit:cover;">
                                @else <span class="badge bg-secondary">{{ __('app.none') }}</span> @endif
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 80) }}</td>
                            <td>
                                <button wire:click="edit({{ $service->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                <button wire:click="delete({{ $service->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">{{ __('app.no_data') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $services->links() }}</div>
        </div>
    </div>
</div>
