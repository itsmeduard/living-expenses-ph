<div class="flex rounded-md shadow-sm mt-1 flatpickr">
    <input
        wire:model="filters.{{ $key }}"
        wire:key="filter-{{ $key }}"
        id="filter-{{ $key }}"
        type="text"
        placeholder="Pick time"
        name="oras"
        @if(isset($filter->options['min']) && strlen($filter->options['min'])) min="{{ $filter->options['min'] }}" @endif
        @if(isset($filter->options['max']) && strlen($filter->options['max'])) max="{{ $filter->options['max'] }}" @endif
        class="form-control"
    />
</div>
