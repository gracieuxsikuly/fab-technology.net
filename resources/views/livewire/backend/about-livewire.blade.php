<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createAboutModal">
        <i class="bi bi-plus-lg me-1"></i> {{ __('app.add') }}
    </button>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="createAboutModal" tabindex="-1" wire:ignore.self>
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
                    @if($isUpdate)
                        <button wire:click="saveabout" class="btn btn-primary">
                            <span wire:loading.remove wire:target="saveabout">{{ __('app.edit') }}</span>
                            <span wire:loading wire:target="saveabout"><span class="spinner-border spinner-border-sm"></span></span>
                        </button>
                    @else
                        <button wire:click="saveabout" class="btn btn-primary">
                            <span wire:loading.remove wire:target="saveabout">{{ __('app.save') }}</span>
                            <span wire:loading wire:target="saveabout"><span class="spinner-border spinner-border-sm"></span></span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteAboutModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
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
                            <th>{{ __('app.image') }}</th>
                            <th>{{ __('app.title') }}</th>
                            <th>{{ __('app.description') }}</th>
                            <th>{{ __('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($abouts as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>
                                @if($about->image)
                                    <img src="{{ asset('assets/img/about/'.$about->image) }}" alt="Image" class="rounded" width="50" height="50" style="object-fit:cover;">
                                @else
                                    <span class="badge bg-secondary">{{ __('app.none') }}</span>
                                @endif
                            </td>
                            <td>{{ $about->title }}</td>
                            <td>{{ Str::limit($about->description, 80) }}</td>
                            <td>
                                <button wire:click="edit({{ $about->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                <button wire:click="delete({{ $about->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">{{ __('app.no_data') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
