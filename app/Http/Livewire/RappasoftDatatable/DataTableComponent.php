<?php
namespace App\Http\Livewire\RappasoftDatatable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Http\Livewire\RappasoftDatatable\Exceptions\DataTableConfigurationException;
use App\Http\Livewire\RappasoftDatatable\Traits\ComponentUtilities;
use App\Http\Livewire\RappasoftDatatable\Traits\WithBulkActions;
use App\Http\Livewire\RappasoftDatatable\Traits\WithColumns;
use App\Http\Livewire\RappasoftDatatable\Traits\WithColumnSelect;
use App\Http\Livewire\RappasoftDatatable\Traits\WithData;
use App\Http\Livewire\RappasoftDatatable\Traits\WithDebugging;
use App\Http\Livewire\RappasoftDatatable\Traits\WithFilters;
use App\Http\Livewire\RappasoftDatatable\Traits\WithFooter;
use App\Http\Livewire\RappasoftDatatable\Traits\WithPagination;
use App\Http\Livewire\RappasoftDatatable\Traits\WithRefresh;
use App\Http\Livewire\RappasoftDatatable\Traits\WithReordering;
use App\Http\Livewire\RappasoftDatatable\Traits\WithSearch;
use App\Http\Livewire\RappasoftDatatable\Traits\WithSecondaryHeader;
use App\Http\Livewire\RappasoftDatatable\Traits\WithSorting;
abstract class DataTableComponent extends Component
{
    use ComponentUtilities,
        WithBulkActions,
        WithColumns,
        WithColumnSelect,
        WithData,
        WithDebugging,
        WithFilters,
        WithFooter,
        WithSecondaryHeader,
        WithPagination,
        WithRefresh,
        WithReordering,
        WithSearch,
        WithSorting;

    protected $listeners = ['refreshDatatable' => '$refresh'];

    /**
     * Runs on every request, immediately after the component is instantiated, but before any other lifecycle methods are called
     */
    public function boot(): void
    {
        $this->{$this->tableName} = [
            'sorts' => $this->{$this->tableName}['sorts'] ?? [],
            'filters' => $this->{$this->tableName}['filters'] ?? [],
        ];

        // Set the user defined columns to work with
        $this->setColumns();

        // Call the child configuration, if any
        $this->configure();

        // Make sure a primary key is set
        if (! $this->hasPrimaryKey()) {
            throw new DataTableConfigurationException('You must set a primary key using setPrimaryKey in the configure method.');
        }

        // Set the filter defaults based on the filter type
        $this->setFilterDefaults();
    }

    /**
     * Runs on every request, after the component is mounted or hydrated, but before any update methods are called
     */
    public function booted(): void
    {
        $this->setTheme();
    }

    /**
     * Set any configuration options
     */
    abstract public function configure(): void;

    /**
     * The array defining the columns of the table.
     *
     * @return array
     */
    abstract public function columns(): array;

    /**
     * The base query.
     */
    public function builder(): Builder
    {
        if ($this->hasModel()) {
            return $this->getModel()::query();
        }

        throw new DataTableConfigurationException('You must either specify a model or implement the builder method.');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire-tables::datatable')
            ->with([
                'columns' => $this->getColumns(),
                'rows' => $this->getRows(),
            ]);
    }
}
