<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use Illuminate\Support\Collection;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\ColumnHelpers;

trait WithColumns
{
    use ColumnHelpers;

    protected Collection $columns;
}
