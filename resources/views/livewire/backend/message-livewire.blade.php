<div>
    <!-- View Message Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.message_details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if($selectedMessage)
                    <div class="mb-2"><strong>{{ __('app.name') }} :</strong> {{ $selectedMessage->nom }}</div>
                    <div class="mb-2"><strong>{{ __('app.object') }} :</strong> {{ $selectedMessage->object }}</div>
                    <div class="mb-2"><strong>{{ __('app.email') }} :</strong> {{ $selectedMessage->email }}</div>
                    <hr>
                    <div><strong>{{ __('app.message') }} :</strong></div>
                    <p class="mt-2">{{ $selectedMessage->message }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteMessageModal" tabindex="-1" wire:ignore.self>
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
                            <th>{{ __('app.name') }}</th>
                            <th>{{ __('app.object') }}</th>
                            <th>{{ __('app.message') }}</th>
                            <th>{{ __('app.email') }}</th>
                            <th>{{ __('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                        <tr>
                            <td>{{ $msg->id }}</td>
                            <td>{{ $msg->nom }}</td>
                            <td>{{ $msg->object }}</td>
                            <td>{{ Str::limit($msg->message, 50) }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>
                                <button wire:click="view({{ $msg->id }})" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                <button wire:click="delete({{ $msg->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">{{ __('app.no_messages') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $messages->links() }}</div>
        </div>
    </div>
</div>
