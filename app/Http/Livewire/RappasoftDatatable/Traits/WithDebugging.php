<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\DebuggingConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\DebugHelpers;

trait WithDebugging
{
    use DebuggingConfiguration,
        DebugHelpers;

    /**
     * Dump table properties for debugging
     *
     * @var bool
     */
    protected bool $debugStatus = false;
}
