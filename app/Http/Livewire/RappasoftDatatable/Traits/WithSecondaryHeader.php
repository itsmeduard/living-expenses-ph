<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\SecondaryHeaderConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\SecondaryHeaderHelpers;

trait WithSecondaryHeader
{
    use SecondaryHeaderConfiguration,
        SecondaryHeaderHelpers;

    protected bool $secondaryHeaderStatus = true;
    protected bool $columnsWithSecondaryHeader = false;
    protected $secondaryHeaderTrAttributesCallback;
    protected $secondaryHeaderTdAttributesCallback;

    public function bootWithSecondaryHeader(): void
    {
        foreach ($this->getColumns() as $column) {
            if ($column->hasSecondaryHeader()) {
                $this->columnsWithSecondaryHeader = true;
            }
        }
    }
}
