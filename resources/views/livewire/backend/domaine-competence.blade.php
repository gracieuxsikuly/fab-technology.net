<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createDomaineModal">
        <i class="bi bi-plus-lg me-1"></i> {{ __('app.add') }}
    </button>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="createDomaineModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
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
                        <label class="form-label fw-semibold">{{ __('app.value_percent') }}</label>
                        <input wire:model.live="value" type="number" min="0" max="100" class="form-control" placeholder="%">
                        @error('value') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.color') }}</label>
                        <input wire:model.live="couleur" type="color" class="form-control form-control-color" title="{{ __('app.color') }}">
                        @error('couleur') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="saveDomaine" class="btn btn-primary">
                        <span wire:loading.remove wire:target="saveDomaine">@if($isUpdate) {{ __('app.edit') }} @else {{ __('app.save') }} @endif</span>
                        <span wire:loading wire:target="saveDomaine"><span class="spinner-border spinner-border-sm"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteDomaineModal" tabindex="-1" wire:ignore.self>
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
                            <th>{{ __('app.title') }}</th>
                            <th>{{ __('app.value_percent') }}</th>
                            <th>{{ __('app.color') }}</th>
                            <th>{{ __('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($domainecompetences as $domaine)
                        <tr>
                            <td>{{ $domaine->id }}</td>
                            <td>{{ $domaine->title }}</td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $domaine->value }}%; background-color: {{ $domaine->couleur }}" aria-valuenow="{{ $domaine->value }}" aria-valuemin="0" aria-valuemax="100">{{ $domaine->value }}%</div>
                                </div>
                            </td>
                            <td>
                                <span class="badge rounded-pill text-white px-3 py-2" style="background-color: {{ $domaine->couleur }}">{{ $domaine->couleur }}</span>
                            </td>
                            <td>
                                <button wire:click="edit({{ $domaine->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                <button wire:click="delete({{ $domaine->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">{{ __('app.no_messages') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $domainecompetences->links() }}</div>
        </div>
    </div>
</div>
