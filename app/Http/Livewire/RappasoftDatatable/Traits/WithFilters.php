<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\FilterConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\FilterHelpers;

trait WithFilters
{
    use FilterConfiguration,
        FilterHelpers;

    public bool $filtersStatus = true;
    public bool $filtersVisibilityStatus = true;
    public bool $filterPillsStatus = true;
    public string $filterLayout = 'popover';

    public function filters(): array
    {
        return [];
    }

    public function applyFilters(Builder $builder): Builder
    {
        if ($this->filtersAreEnabled() && $this->hasFilters() && $this->hasAppliedFiltersWithValues()) {
            foreach ($this->getFilters() as $filter) {
                foreach ($this->getAppliedFiltersWithValues() as $key => $value) {
                    if ($filter->getKey() === $key && $filter->hasFilterCallback()) {
                        // Let the filter class validate the value
                        $value = $filter->validate($value);

                        if ($value === false) {
                            continue;
                        }

                        ($filter->getFilterCallback())($builder, $value);
                    }
                }
            }
        }

        return $builder;
    }
}
