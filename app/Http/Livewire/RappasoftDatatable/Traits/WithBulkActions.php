<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\BulkActionsConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\BulkActionsHelpers;

trait WithBulkActions
{
    use BulkActionsConfiguration,
        BulkActionsHelpers;

    public bool $bulkActionsStatus = true;
    public bool $selectAll = false;
    public array $bulkActions = [];
    public array $selected = [];
    public bool $hideBulkActionsWhenEmpty = false;

    public function bulkActions(): array
    {
        if (property_exists($this, 'bulkActions')) {
            return $this->bulkActions;
        }

        return [];
    }
}
