<?php
namespace App\Http\Livewire\RappasoftDatatable\Views\Columns;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\RappasoftDatatable\Exceptions\DataTableConfigurationException;
use App\Http\Livewire\RappasoftDatatable\Views\Column;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Configuration\BooleanColumnConfiguration;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Helpers\BooleanColumnHelpers;

class BooleanColumn extends Column
{
    use BooleanColumnConfiguration,
        BooleanColumnHelpers;

    protected bool $successValue = true;
    protected string $view = 'livewire-tables::includes.columns.boolean';
    protected $callback;

    public function getContents(Model $row)
    {
        if ($this->isLabel()) {
            throw new DataTableConfigurationException('You can not specify a boolean column as a label.');
        }

        $value = $this->getValue($row);

        return view($this->getView())
            ->withComponent($this->getComponent())
            ->withSuccessValue($this->getSuccessValue())
            ->withStatus($this->hasCallback() ? app()->call($this->getCallback(), ['value' => $value]) : (bool)$value === true);
    }
}
