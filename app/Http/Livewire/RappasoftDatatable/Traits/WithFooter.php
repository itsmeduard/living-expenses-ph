<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\FooterConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\FooterHelpers;

trait WithFooter
{
    use FooterConfiguration,
        FooterHelpers;

    protected bool $footerStatus = true;
    protected bool $useHeaderAsFooterStatus = false;
    protected bool $columnsWithFooter = false;
    protected $footerTrAttributesCallback;
    protected $footerTdAttributesCallback;

    public function bootWithFooter(): void
    {
        foreach ($this->columns() as $column) {
            if ($column->hasFooter()) {
                $this->columnsWithFooter = true;
            }
        }
    }
}
