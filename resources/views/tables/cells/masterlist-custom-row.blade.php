<x-livewire-tables::bs5.table.cell>
    {{ $row->date_scanned }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->time_scanned }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->location }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->operator }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->pnumber }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->transport_inspector_name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a class='btn btn-success btn-icon-split' role='button' href='#updateModal' data-bs-toggle='modal' wire:click="edit({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-pencil-alt' style='color: rgb(58,196,125);'></i>
    </a>
    <a class='btn btn-danger btn-icon-split' role='button' href='#deleteModal' data-bs-toggle='modal' wire:click="show({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-trash-alt' style='color: #d92550;'></i>
    </a>
</x-livewire-tables::bs5.table.cell>

{{-- Update Item --}}
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Item</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Date Scanned<span style='color: red;'>*</span></label>
                        <input type='date' class="form-control" wire:model="date_scanned" placeholder="Date Scanned">
                        @error('date_scanned')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Time Scanned<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="time_scanned" placeholder="Time Scanned">
                        @error('time_scanned')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Location<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="location" placeholder="Location">
                        @error('location')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Operator<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="operator" placeholder="Location">
                        @error('operator')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Plate Number<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="pnumber" placeholder="Plate Number">
                        @error('pnumber')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" wire:loading.remove>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update({{$rowid}})" class="btn btn-success close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{-- Delete Item --}}
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <p>Are you sure you? This action is irreversible.</p>
                </div>
            </div>
            <div class="modal-footer" wire:loading.remove>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="delete({{$rowid}})" class="btn btn-danger close-modal">Delete</button>
            </div>
        </div>
    </div>
</div>
