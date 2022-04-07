<?php
namespace App\Http\Livewire\Modules\User;
use App\Http\Livewire\RappasoftDatatable\Views\{Column,Filter};
use App\Http\Livewire\RappasoftDatatable\DataTableComponent;
use App\Excel\ExpensesExport;
use App\Models\Expenses;
use DB;
class UserExpenses extends DataTableComponent
{
    public bool $dumpFilters = false;
    public bool $columnSelect = true;
    public bool $responsive = true;
    public $refresh = 20000;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setReorderEnabled()
            ->setSingleSortingDisabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->setFilterLayoutSlideDown()
            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }

                return ['default' => true];
            })
            ->setFooterTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function(Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setBulkActions([
                'exportSelected' => 'Export',
            ]);
    }

    public $columnSearch = [
        'item'           => null,
        'amount'         => null,
        'quantity'       => null,
        'datetime_added' => null,
        'category'       => null,
        'item_status'    => null,
        'description'    => null,
    ];

//    public array $bulkActions = [ 'exportSelected' => 'Export', ];

//    public function exportSelected() {
//        if ($this->selectedRowsQuery->count() > 0)
//        {
//            return (new ExpensesExport($this->selectedKeys()))->download('expenses.xls');
//        }
//    }

//    public function boot() { $this->queryString['columnSearch'] = ['except' => null]; }

    public function columns(): array
    {
        return [
            Column::make('Item','item')
                ->sortable()
                ->asHtml()
                ->searchable(),
            Column::make('Amount','amount')
                ->sortable()
                ->asHtml()
                ->searchable(),
            Column::make('Quantity','quantity')
                ->sortable()
                ->asHtml()
                ->searchable(),
            Column::make('DateTime Added', 'datetime_added')
                ->sortable(),
            Column::make('Category','category')
                ->sortable()
                ->asHtml()
                ->searchable(),
            Column::make('Description','description')
                ->sortable()
                ->asHtml()
                ->searchable(),
            Column::make('Specification','item_status')
                ->sortable()
                ->asHtml()
                ->searchable(),
        ];
    }

    public function filters(): array
    {
            return [
                'datetime_added_from' => Filter::make('DateTime Added From') ->date(),
                'datetime_added_to'   => Filter::make('DateTime Added To')   ->date(),
                'item_status'         => Filter::make('Specification')       ->multiSelect(
                    [
                        'Needs' => 'Needs',
                        'Wants' => 'Wants',
                    ]),
            ];
    }

    public function query()
    {
        return Expenses::leftJoin('category as c', 'c.id','expenses.category_id')
            ->select('expenses.id as id','expenses.datetime_added as datetime_added','expenses.item as item','expenses.amount as amount','expenses.quantity as quantity','category.category as category','expenses.description as description','expenses.item_status as item_status')
            ->when($this->getFilter('datetime_added_from'), fn($query, $datetime) => $query
                ->where('datetime_added', '>=', $datetime)
            )
            ->when($this->getFilter('datetime_added_to'), fn($query, $datetime) => $query
                ->where('datetime_added', '<=', $datetime)
            )
            ->when($this->columnSearch['item'] ?? null, fn ($query, $item) => $query
                ->where('item', 'like', '%' . $item . '%')
            )
            ->when($this->columnSearch['amount'] ?? null, fn ($query, $amount) => $query
                ->where('amount', 'like', '%' . $amount . '%')
            )
            ->when($this->columnSearch['quantity'] ?? null, fn ($query, $quantity) => $query
                ->where('quantity', 'like', '%' . $quantity . '%')
            )
            ->when($this->columnSearch['category'] ?? null, fn ($query, $category) => $query
                ->where('category', 'like', '%' . $category . '%')
            )
            ->when($this->columnSearch['item_status'] ?? null, fn ($query, $item_status) => $query
                ->where('item_status', 'like', '%' . $item_status . '%')
            )
            ->when($this->columnSearch['description'] ?? null, fn ($query, $description) => $query
                ->where('description', 'like', '%' . $description . '%')
            );
    }

    public function setTableRowClass($row): ?string { if ($row->active === false){return 'bg-danger text-white';}return null; }
}
