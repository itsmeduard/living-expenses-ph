<div>
    <div class='container-fluid'>
        <h3 class='text-dark mb-4'>Living Expenses</h3>
        <div class='card shadow'>
            <div class='card-header py-3' wire:ignore>
                <p class='text-primary m-0 fw-bold'>
                    @if(
                        request()->routeIs('user.dashboard*') ||
                        request()->routeIs('user.expenses*')
                    )
                    <a class='btn btn-primary float-end btn-icon-split' role='button' data-bs-target="#addModal" data-bs-toggle='modal'>
                        <span class='text-white-50 icon'>
                            <i class='fas fa-plus'></i>
                        </span>
                        <span class='text-white text'>New Item</span>
                    </a>
                    @endif
                </p>
            </div>
            <div class='card-body'
                @if (is_numeric($refresh))
                    wire:poll.{{ $refresh }}ms
                @elseif(is_string($refresh))
                    @if ($refresh === '.keep-alive' || $refresh === 'keep-alive')
                        wire:poll.keep-alive
                    @elseif($refresh === '.visible' || $refresh === 'visible')
                        wire:poll.visible
                    @else
                        wire:poll="{{ $refresh }}"
                    @endif
                @endif
                class="container-fluid p-0"
            >
                @include('livewire-tables::includes.debug')
                @include('livewire-tables::bootstrap-5.includes.offline')
                @include('livewire-tables::bootstrap-5.includes.sorting-pills')
                @include('livewire-tables::bootstrap-5.includes.filter-pills')

                <div class="d-md-flex justify-content-between mb-3">
                    <div class="d-md-flex">
                        @include('livewire-tables::bootstrap-5.includes.reorder')
                        @include('livewire-tables::bootstrap-5.includes.search')
                        @if ($filtersEnabled && $showFilterDropdown)
                            <div class="{{ $showSearch ? 'ms-0 ms-md-2' : '' }} mb-3 mb-md-0">
                                @include('livewire-tables::bootstrap-5.includes.filters')
                            </div>
                        @endif
                    </div>

                    <div class="d-md-flex">
                        <div>@include('livewire-tables::bootstrap-5.includes.bulk-actions')</div>
                        <div>@include('livewire-tables::bootstrap-5.includes.column-select')</div>
                        <div>@include('livewire-tables::bootstrap-5.includes.per-page')</div>
                    </div>
                </div>

                @include('livewire-tables::bootstrap-5.includes.table')
                @include('livewire-tables::bootstrap-5.includes.pagination')
            </div>
        </div>
    </div>
{{--    @isset($modalsView)--}}
{{--        @include($modalsView)--}}
{{--    @endisset--}}
</div>
