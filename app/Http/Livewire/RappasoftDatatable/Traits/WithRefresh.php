<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\RefreshConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\RefreshHelpers;

trait WithRefresh
{
    use RefreshConfiguration,
        RefreshHelpers;

    /**
     * Whether to refresh the table at a certain interval or not
     * false is off
     * If it's an integer it will be treated as milliseconds (2000 = refresh every 2 seconds)
     * If it's a string it will call that function every 5 seconds unless it is 'keep-alive' or 'visible'.
     *
     * @var bool|string
     */
    protected $refresh = false;
}
