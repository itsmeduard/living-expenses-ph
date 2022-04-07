<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\SearchConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\SearchHelpers;

trait WithSearch
{
    use SearchConfiguration,
        SearchHelpers;

    public ?string $search = null;
    public bool $searchStatus = true;
    public bool $searchVisibilityStatus = true;
    public ?int $searchFilterDebounce = null;
    public ?bool $searchFilterDefer = null;
    public ?bool $searchFilterLazy = null;

    // TODO
    public function applySearch(Builder $builder): Builder
    {
        if ($this->searchIsEnabled() && $this->hasSearch()) {
            $searchableColumns = $this->getSearchableColumns();

            if ($searchableColumns->count()) {
                $builder->where(function ($query) use ($searchableColumns) {
                    foreach ($searchableColumns as $index => $column) {
                        if ($column->hasSearchCallback()) {
                            ($column->getSearchCallback())($query, $this->getSearch());
                        } else {
                            $query->{$index === 0 ? 'where' : 'orWhere'}($column->getColumn(), 'like', '%'.$this->getSearch().'%');
                        }
                    }
                });
            }
        }

        return $builder;
    }
}
