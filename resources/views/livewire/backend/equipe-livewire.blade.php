<div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createEquipeModal">
        <i class="bi bi-plus-lg me-1"></i> {{ __('app.add') }}
    </button>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="createEquipeModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if($isUpdate) {{ __('app.edit_info') }} @else {{ __('app.add_info') }} @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('app.designation') }}</label>
                            <input wire:model.live="designation" type="text" class="form-control" placeholder="{{ __('app.designation') }}">
                            @error('designation') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('app.fonction') }}</label>
                            <input wire:model.live="fonction" type="text" class="form-control" placeholder="{{ __('app.fonction') }}">
                            @error('fonction') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('app.phone') }}</label>
                            <input wire:model.live="phone" type="tel" class="form-control" placeholder="{{ __('app.phone') }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('app.email') }}</label>
                            <input wire:model.live="email" type="email" class="form-control" placeholder="{{ __('app.email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('app.photo') }}</label>
                        <input wire:model.live="image" type="file" class="form-control" accept="image/*">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                    <button wire:click="saveEquipe" class="btn btn-primary">
                        <span wire:loading.remove wire:target="saveEquipe">@if($isUpdate) {{ __('app.edit') }} @else {{ __('app.save') }} @endif</span>
                        <span wire:loading wire:target="saveEquipe"><span class="spinner-border spinner-border-sm"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteEquipeModal" tabindex="-1" wire:ignore.self>
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
                            <th>{{ __('app.designation') }}</th>
                            <th>{{ __('app.fonction') }}</th>
                            <th>{{ __('app.phone') }}</th>
                            <th>{{ __('app.email') }}</th>
                            <th>{{ __('app.image') }}</th>
                            <th>{{ __('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($persons as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->designation }}</td>
                            <td>{{ $person->fonction }}</td>
                            <td>{{ $person->phone }}</td>
                            <td>{{ $person->email }}</td>
                            <td>
                                @if($person->image)
                                    <img src="{{ asset('assets/img/equipe/'.$person->image) }}" alt="Image" class="rounded-circle" width="40" height="40" style="object-fit:cover;">
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                <button wire:click="edit({{ $person->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                <button wire:click="delete({{ $person->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">{{ __('app.no_messages') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $persons->links() }}</div>
        </div>
    </div>
</div>
