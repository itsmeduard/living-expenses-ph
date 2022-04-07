@if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
<x-livewire-tables::bs5.table.cell>
    {{ $row->region }}
</x-livewire-tables::bs5.table.cell>
@endif

<x-livewire-tables::bs5.table.cell>
    {{ $row->consortium }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->operator }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->pnumber }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->fnumber }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->class }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->rname }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->rcode }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->remarks }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a class='btn btn-success btn-icon-split' role='button' href='#updateModal' data-bs-toggle='modal' wire:click="edit({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-pencil-alt' style='color: rgb(58,196,125);'></i>
    </a>
    <a class='btn btn-danger btn-icon-split' role='button' href='#deleteModal' data-bs-toggle='modal' wire:click="show({{ $row->id }})" style='background: rgba(255,255,255,0);border-radius: 0px;border-width: 0px;border-style: none;'>
        <i class='fas fa-trash-alt' style='color: #d92550;'></i>
    </a>
</x-livewire-tables::bs5.table.cell>

{{-- Add record --}}
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Item</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-1">
                        @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                        <div class="col-lg-1">
                            <div class="form-floating">
                                <select wire:model='region.0' class='form control form-control-sm' style="font-size: 12px;" id="floatingRegion" required>
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
                                <label class="form-label" for="floatingRegion" style="font-size: 12px;">Region<span style='color: red;'>*</span></label>
                                @error('region.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        @endif
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='consortium.0' class="form-control form-control-sm" type="text" id="floatingConsortium" placeholder="Consortium" required>
                                <label class="form-label" for="floatingConsortium" style="font-size: 12px;">Consortium<span style='color: red;'>*</span></label>
                                @error('consortium.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-floating">
                                <input wire:model='operator.0' class="form-control form-control-sm" type="text" id="floatingOperator" placeholder="Operator" required>
                                <label class="form-label" for="floatingOperator" style="font-size: 12px;">Operator<span style='color: red;'>*</span></label>
                                @error('operator.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='pnumber.0' class="form-control form-control-sm" type="text" id="floatingPlate" placeholder="Plate" required>
                                <label class="form-label" for="floatingPlate" style="font-size: 12px;">Plate<span style='color: red;'>*</span></label>
                                @error('pnumber.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-floating">
                                <input wire:model='fnumber.0' class="form-control form-control-sm" type="text" id="floatingFleet" placeholder="Fleet" required>
                                <label class="form-label" for="floatingFleet" style="font-size: 12px;">Fleet<span style='color: red;'>*</span></label>
                                @error('fnumber.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select wire:model='class.0' class='form-control' id="floatingClass" style="font-size: 12px;" required>
                                    <option selected>--Select--</option>
                                    <option value='City Bus'>City Bus</option>
                                    <option value='Provincial Bus'>Provincial Bus</option>
                                </select>
                                <label class="form-label" for="floatingClass" style="font-size: 12px;">Class<span style='color: red;'>*</span></label>
                                @error('class.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-floating">
                                <select wire:model='rname.0' class='form control form-control-sm' style="font-size: 12px;" id="floatingRouteName" required>
                                    <option selected>--Select--</option>
                                    @foreach($route as $r)
                                        <option value='{{$r->rname}}'>{{$r->rname}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="floatingRouteName" style="font-size: 12px;">RouteName<span style='color: red;'>*</span></label>
                                @error('rname.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-floating">
                                <select wire:model='rcode.0' class='form control form-control-sm' style="font-size: 12px;" id="floatingRouteCode" required>
                                    <option selected>--Select--</option>
                                    @foreach($route as $r)
                                        <option value='{{$r->rcode}}'>{{$r->rcode}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="floatingCode" style="font-size: 12px;">Code<span style='color: red;'>*</span></label>
                                @error('rcode.0')<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='remarks.0' class="form-control form-control-sm" type="text" id="floatingRemarks" placeholder="Remarks">
                                <label class="form-label" for="floatingRemarks" style="font-size: 12px;">Remarks</label>
                            </div>
                        </div>
                        <div class="col-lg-1 d-lg-flex justify-content-lg-center align-items-lg-center">
                            <button wire:loading.attr='disabled' wire:click.prevent="add({{$i}})" class="btn btn-success btn-sm" type="button">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                    @foreach($inputs as $key => $value)
                    <div class="row mb-1">
                        @if(auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Masteradmin')
                            <div class="col-lg-1">
                                <div class="form-floating">
                                    <select wire:model='region.{{ $value }}' class='form control form-control-sm' id="floatingRegion" style="font-size: 12px;" required>
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
                                    <label class="form-label" for="floatingRegion" style="font-size: 12px;">Region<span style='color: red;'>*</span></label>
                                    @error('region.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                                </div>
                            </div>
                        @endif
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='consortium.{{ $value }}' class="form-control form-control-sm" type="text" id="floatingConsortium" placeholder="Consortium" required>
                                <label class="form-label" for="floatingConsortium" style="font-size: 12px;">Consortium<span style='color: red;'>*</span></label>
                                @error('consortium.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-floating">
                                <input wire:model='operator.{{ $value }}' class="form-control form-control-sm" type="text" id="floatingOperator" placeholder="Operator" required>
                                <label class="form-label" for="floatingOperator" style="font-size: 12px;">Operator<span style='color: red;'>*</span></label>
                                @error('operator.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='pnumber.{{ $value }}' class="form-control form-control-sm" type="text" id="floatingPlate" placeholder="Plate" required>
                                <label class="form-label" for="floatingPlate" style="font-size: 12px;">Plate<span style='color: red;'>*</span></label>
                                @error('pnumber.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-floating">
                                <input wire:model='fnumber.{{ $value }}' class="form-control form-control-sm" type="text" id="floatingFleet" placeholder="Fleet" required>
                                <label class="form-label" for="floatingFleet" style="font-size: 12px;">Fleet<span style='color: red;'>*</span></label>
                                @error('fnumber.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select wire:model='class.{{ $value }}' class='form-control' id="floatingClass" style="font-size: 12px;" required>
                                    <option selected>--Select--</option>
                                    <option value='City Bus'>City Bus</option>
                                    <option value='Provincial Bus'>Provincial Bus</option>
                                </select>
                                <label class="form-label" for="floatingClass" style="font-size: 12px;">Class<span style='color: red;'>*</span></label>
                                @error('class.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-floating">
                                <select wire:model='rname.{{ $value }}' class='form control form-control-sm' style="font-size: 12px;" id="floatingRouteName" required>
                                    <option selected>--Select--</option>
                                    @foreach($route as $r)
                                        <option value='{{$r->rname}}'>{{$r->rname}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="floatingRouteName" style="font-size: 12px;">RouteName<span style='color: red;'>*</span></label>
                                @error('rname.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-floating">
                                <select wire:model='rcode.{{ $value }}' class='form control form-control-sm' style="font-size: 12px;" id="floatingRouteCode" required>
                                    <option selected>--Select--</option>
                                    @foreach($route as $r)
                                        <option value='{{$r->rcode}}'>{{$r->rcode}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="floatingCode" style="font-size: 12px;">Code<span style='color: red;'>*</span></label>
                                @error('rcode.'.$value)<p style='color: red;'>{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input wire:model='remarks.{{ $value }}' class="form-control form-control-sm" type="text" id="floatingRemarks" placeholder="Remarks">
                                <label class="form-label" for="floatingRemarks" style="font-size: 12px;">Remarks</label>
                            </div>
                        </div>
                        <div class="col-lg-1 d-lg-flex justify-content-lg-center align-items-lg-center">
                            <button wire:loading.attr='disabled' wire:click.prevent="add({{$i}})" class="btn btn-success btn-sm m-1" type="button">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                            <button wire:loading.attr='disabled' wire:click.prevent="remove({{$key}})" class="btn btn-danger btn-sm m-1" type="button">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    <div class="modal-footer" wire:loading.disable>
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="store({{$rowid}})" class="btn btn-success close-modal">Save changes</button>
                    </div>
                </form>
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
                        <label>Consortium<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="consortium">
                        @error('consortium')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Operator<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="operator" placeholder="Juan Dela Cruz Transport">
                        @error('operator')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Plate Number<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="pnumber" placeholder="ABC123">
                        @error('pnumber')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Fleet Number</label>
                        <input type='text' class="form-control" wire:model="fnumber" placeholder="1">
                        @error('fnumber')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Classification<span style='color: red;'>*</span></label>
                        <select wire:model='class' class='form control' required>
                            <option selected value=''>--Select--</option>
                            <option value='City Bus'>City Bus</option>
                            <option value='Provincial Bus'>Provincial Bus</option>
                        </select>
                        @error('class')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Route Name<span style='color: red;'>*</span></label>
                        <select wire:model='rname' class='form control' required>
                            <option selected value=''>--Select--</option>
                            @foreach($route as $r)
                                <option value='{{$r->rname}}'>{{$r->rname}}</option>
                            @endforeach
                        </select>
                        @error('rname')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Route Code<span style='color: red;'>*</span></label>
                        <select wire:model='rcode' class='form control' required>
                            <option selected value=''>--Select--</option>
                            @foreach($route as $r)
                                <option value='{{$r->rcode}}'>{{$r->rcode}}</option>
                            @endforeach
                        </select>
                        @error('rcode')<p style='color: red;'>{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label>Remarks<span style='color: red;'>*</span></label>
                        <input type='text' class="form-control" wire:model="remarks" placeholder="Remarks">
                        @error('remarks')<p style='color: red;'>{{ $message }}</p>@enderror
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
