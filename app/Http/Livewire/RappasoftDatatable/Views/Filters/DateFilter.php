<?php
namespace App\Http\Livewire\RappasoftDatatable\Views\Filters;

use DateTime;
use App\Http\Livewire\RappasoftDatatable\DataTableComponent;
use App\Http\Livewire\RappasoftDatatable\Views\Filter;

class DateFilter extends Filter
{
    public function validate($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) === false) {
            return false;
        }

        return $value;
    }

    public function isEmpty($value): bool
    {
        return $value === '';
    }

    public function render(DataTableComponent $component)
    {
        return view('livewire-tables::components.tools.filters.date', [
            'component' => $component,
            'filter' => $this,
        ]);
    }
}
