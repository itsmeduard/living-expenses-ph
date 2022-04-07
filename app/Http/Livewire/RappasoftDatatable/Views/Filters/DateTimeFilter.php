<?php
namespace App\Http\Livewire\RappasoftDatatable\Views\Filters;

use DateTime;
use App\Http\Livewire\RappasoftDatatable\DataTableComponent;
use App\Http\Livewire\RappasoftDatatable\Views\Filter;

class DateTimeFilter extends Filter
{
    public function validate($value)
    {
        if (DateTime::createFromFormat('Y-m-d\TH:i', $value) === false) {
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
        return view('livewire-tables::components.tools.filters.datetime', [
            'component' => $component,
            'filter' => $this,
        ]);
    }
}
