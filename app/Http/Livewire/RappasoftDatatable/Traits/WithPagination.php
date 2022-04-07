<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits;

use Livewire\WithPagination as LivewirePagination;
use App\Http\Livewire\RappasoftDatatable\Traits\Configuration\PaginationConfiguration;
use App\Http\Livewire\RappasoftDatatable\Traits\Helpers\PaginationHelpers;

trait WithPagination
{
    use LivewirePagination,
        PaginationConfiguration,
        PaginationHelpers;

    public ?string $pageName = null;
    public int $perPage = 10;
    public array $perPageAccepted = [10, 25, 50];
    public string $paginationTheme = 'tailwind';
    public bool $paginationStatus = true;
    public bool $paginationVisibilityStatus = true;
    public bool $perPageVisibilityStatus = true;

    // TODO: Test
    public function mountWithPagination(): void
    {
        if ($this->paginationIsDisabled()) {
            return;
        }

        if (in_array(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()), $this->getPerPageAccepted(), true)) {
            $this->setPerPage(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()));
        } else {
            $this->setPerPage($this->getPerPageAccepted()[0] ?? 10);
        }
    }

    // TODO: Test
    public function updatedPerPage($value): void
    {
        if (! in_array($value, $this->getPerPageAccepted(), false)) {
            $value = $this->setPerPage($this->getPerPageAccepted()[0] ?? 10);
        }

        if (in_array(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()), $this->getPerPageAccepted(), true)) {
            session()->put($this->getPerPagePaginationSessionKey(), (int) $value);
        } else {
            session()->put($this->getPerPagePaginationSessionKey(), $this->getPerPageAccepted()[0] ?? 10);
        }

        $this->resetComputedPage();
    }

    /**
     * Reset the page using the custom page name
     */
    public function resetComputedPage(): void
    {
        $this->resetPage($this->getComputedPageName());
    }

    private function getPerPagePaginationSessionKey(): string
    {
        return $this->tableName.'-perPage';
    }
}
