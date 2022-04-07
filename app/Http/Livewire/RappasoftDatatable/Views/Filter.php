<?php
namespace App\Http\Livewire\RappasoftDatatable\Views;
use Illuminate\Support\Str;
use App\Http\Livewire\RappasoftDatatable\DataTableComponent;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Configuration\FilterConfiguration;
use App\Http\Livewire\RappasoftDatatable\Views\Traits\Helpers\FilterHelpers;
abstract class Filter
{
    use FilterConfiguration,
        FilterHelpers;

    protected string $name;
    protected string $key;
    protected $filterCallback = null;
    protected array $config = [];
    protected ?string $filterPillTitle = null;
    protected array $filterPillValues = [];

    public function __construct(string $name, string $key = null)
    {
        $this->name = $name;

        if ($key) {
            $this->key = $key;
        } else {
            $this->key = Str::snake($name);
        }
    }

    public static function make(string $name, string $key = null): Filter
    {
        return new static($name, $key);
    }

    abstract public function isEmpty(string $value): bool;

    abstract public function render(DataTableComponent $component);
}
