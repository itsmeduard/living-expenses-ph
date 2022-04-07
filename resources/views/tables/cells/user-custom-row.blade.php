@if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
<x-livewire-tables::bs5.table.cell>
    {{ $row->region }}
</x-livewire-tables::bs5.table.cell>
@endif

<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->username }}
</x-livewire-tables::bs5.table.cell>

{{--Hide Role--}}
@if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
<x-livewire-tables::bs5.table.cell>
    {{ $row->role }}
</x-livewire-tables::bs5.table.cell>
@endif

<x-livewire-tables::bs5.table.cell>
    {{ $row->position }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->qrcode }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a class='btn btn-success btn-icon-split' role='button' href='#updateModal' data-bs-toggle='modal' wire:click="edit({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-pencil-alt' style='color: rgb(58,196,125);'></i>
    </a>
    <a class='btn btn-danger btn-icon-split' role='button' href='#deleteModal' data-bs-toggle='modal' wire:click="show({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-trash-alt' style='color: #d92550;'></i>
    </a>
    <a class='btn btn-primary btn-icon-split' role='button' href='#changePasswordModal' data-bs-toggle='modal' wire:click="showPassword({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-key' style='color: #4e73df;'></i>
    </a>
</x-livewire-tables::bs5.table.cell>

{{-- Add denomination --}}
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Item</h5>
            </div>
            <div class="modal-body">
                <form>
                    @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                    <div class="form-group">
                        <label>Region<span style='color: red;'>*</span></label>
                        <select wire:model='region' class='form control' required>
                            <option selected value=''>--Select--</option>
                            <option value='NATIONAL CAPITAL REGION - CENTRAL'>CENTRAL</option>
                            <option value='NATIONAL CAPITAL REGION'>NCR</option>
                            <option value='REGION 1'>REGION 1</option>
                            <option value='REGION 2'>REGION 2</option>
                            <option value='REGION 3'>REGION 3</option>
                            <option value='REGION 4A'>REGION 4A</option>
                            <option value='REGION 4B'>REGION 4B</option>
                            <option value='REGION 5'>REGION 5</option>
                            <option value='REGION 6'>REGION 6</option>
                            <option value='REGION 7'>REGION 7</option>
                            <option value='REGION 8'>REGION 8</option>
                            <option value='REGION 9'>REGION 9</option>
                            <option value='REGION 10'>REGION 10</option>
                            <option value='REGION 11'>REGION 11</option>
                            <option value='REGION 12'>REGION 12</option>
                            <option value='CARAGA'>CARAGA</option>
                            <option value='CAR'>CAR</option>
                        </select>
                        @error('region')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Name<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="name" placeholder="Full Name">
                        @error('name')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>ID No.<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="username" placeholder="ID No.">
                        @error('username')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                    <div class="form-group">
                        <label>Role<span style='color: red;'>*</span></label>
                        <select wire:model='role' class='form control' required>
                            <option selected value=''>--Select--</option>
                            <option value='Masteradmin'>Masteradmin</option>
                            <option value='Admin'>Admin</option>
                            <option value='User'>User</option>
                        </select>
                        @error('role')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Position<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="position" placeholder="Transport Inspector II">
                        @error('position')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>QR Code</label>
                        <input type='text' class="form-control" wire:model="qrcode" placeholder="ID QR Code Value">
                        @error('qrcode')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Email<span style='color: red;'>*</span></label>
                        <input type='email' class="form-control" wire:model="email" placeholder="juandelacruz@gmail.com">
                        @error('email')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Password<span style='color: red;'>*</span></label>
                        <input type='password' class="form-control" wire:model="npassword" placeholder="*******">
                        @error('npassword')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password<span style='color: red;'>*</span></label>
                        <input type='password' class="form-control" wire:model="cpassword" placeholder="*******">
                        @error('cpassword')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" wire:loading.remove>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store({{$rowid}})" class="btn btn-success close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- Update Item --}}
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update User</h5>
            </div>
            <div class="modal-body">
                <form>
                    @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                    <div class="form-group">
                        <label>Region<span style='color: red;'>*</span></label>
                        <select wire:model='region' class='form control' required>
                            <option selected value=''>--Select--</option>
                            <option value='NATIONAL CAPITAL REGION - CENTRAL'>CENTRAL</option>
                            <option value='NATIONAL CAPITAL REGION'>NCR</option>
                            <option value='REGION 1'>REGION 1</option>
                            <option value='REGION 2'>REGION 2</option>
                            <option value='REGION 3'>REGION 3</option>
                            <option value='REGION 4A'>REGION 4A</option>
                            <option value='REGION 4B'>REGION 4B</option>
                            <option value='REGION 5'>REGION 5</option>
                            <option value='REGION 6'>REGION 6</option>
                            <option value='REGION 7'>REGION 7</option>
                            <option value='REGION 8'>REGION 8</option>
                            <option value='REGION 9'>REGION 9</option>
                            <option value='REGION 10'>REGION 10</option>
                            <option value='REGION 11'>REGION 11</option>
                            <option value='REGION 12'>REGION 12</option>
                            <option value='CARAGA'>CARAGA</option>
                            <option value='CAR'>CAR</option>
                        </select>
                        @error('region')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Name<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="name" placeholder="Full Name">
                        @error('name')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>ID No.<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="username" placeholder="ID No.">
                        @error('username')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                    <div class="form-group">
                        <label>Role<span style='color: red;'>*</span></label>
                        <select wire:model='role' class='form control' required>
                            <option selected value=''>--Select--</option>
                            <option value='Masteradmin'>Masteradmin</option>
                            <option value='Admin'>Admin</option>
                            <option value='User'>User</option>
                        </select>
                        @error('role')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Position<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="position" placeholder="Information Technology Officer I">
                        @error('position')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>QR Code</label>
                        <input type='text' class="form-control" wire:model="qrcode" placeholder="ID QR Code Value">
                        @error('qrcode')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Email<span style='color: red;'>*</span></label>
                        <input type='email' class="form-control" wire:model="email" placeholder="admin@ltfrb.gov.ph">
                        @error('email')<p style='color: red;'>{{ $message }}</p>@enderror
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

{{-- Change Password --}}
<div wire:ignore.self class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>New Password<span style='color: red;'>*</span></label>
                        <input type='password' class="form-control" wire:model="npassword" placeholder="New Password">
                        @error('npassword')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password<span style='color: red;'>*</span></label>
                        <input type='password' class="form-control" wire:model="cpassword" placeholder="Confirm Password">
                        @error('cpassword')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" wire:loading.remove>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="changepassword({{$rowid}})" class="btn btn-success close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
