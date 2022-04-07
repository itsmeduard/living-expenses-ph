<?php
namespace App\Excel;
use Maatwebsite\Excel\Concerns\{Exportable, FromQuery, WithHeadings, WithMapping};
use App\Models\{Expenses,Category};
class ExpensesExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selectedRowsQuery;

    public function __construct($selectedRowsQuery)
    {
        $this->selectedRowsQuery = $selectedRowsQuery;
    }

    public function headings(): array
    {
        return [
            'Item', 'Amount', 'Quantity','Item Status','Category','Date&Time Added','Description'
        ];
    }

    public function map($exportdata): array
    {
        ;
        return [
            $exportdata->item,
            $exportdata->amount,
            $exportdata->quantity,
            $exportdata->item_status,
            Category::where('category_id',$exportdata->category)->first(),
            $exportdata->datetime_added,
            $exportdata->description,
        ];
    }

    public function query()
    {
        return Expenses::whereIn('id', $this->selectedRowsQuery);
    }
}
