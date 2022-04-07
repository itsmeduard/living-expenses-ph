<?php
namespace App\Http\Livewire\RappasoftDatatable\Views\Columns;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\RappasoftDatatable\Exceptions\DataTableConfigurationException;
use App\Http\Livewire\RappasoftDatatable\Views\Column;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Configuration\ImageColumnConfiguration;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Helpers\ImageColumnHelpers;

class ImageColumn extends Column
{
    use ImageColumnHelpers,
        ImageColumnConfiguration;

    protected string $view = 'livewire-tables::includes.columns.image';
    protected $locationCallback;
    protected $attributesCallback;

    public function __construct(string $title, string $from = null)
    {
        parent::__construct($title, $from);

        $this->label(fn () => null);
    }

    public function getContents(Model $row)
    {
        if (! $this->hasLocationCallback()) {
            throw new DataTableConfigurationException('You must specify a location callback for an image column.');
        }

        return view($this->getView())
            ->withColumn($this)
            ->withPath(app()->call($this->getLocationCallback(), ['row' => $row]))
            ->withAttributes($this->hasAttributesCallback() ? app()->call($this->getAttributesCallback(), ['row' => $row]) : []);
    }
}
