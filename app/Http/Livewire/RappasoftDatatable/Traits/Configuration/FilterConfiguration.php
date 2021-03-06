<?php
namespace App\Http\Livewire\RappasoftDatatable\Traits\Configuration;

use App\Http\Livewire\RappasoftDatatable\Exceptions\DataTableConfigurationException;

trait FilterConfiguration
{
    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setFiltersStatus(bool $status): self
    {
        $this->filtersStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setFiltersEnabled(): self
    {
        $this->setFiltersStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setFiltersDisabled(): self
    {
        $this->setFiltersStatus(false);

        return $this;
    }

    /**
     * @param  bool $status
     *
     * @return $this
     */
    public function setFiltersVisibilityStatus(bool $status): self
    {
        $this->filtersVisibilityStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setFiltersVisibilityEnabled(): self
    {
        $this->setFiltersVisibilityStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setFiltersVisibilityDisabled(): self
    {
        $this->setFiltersVisibilityStatus(false);

        return $this;
    }

    /**
     * @param  bool $status
     *
     * @return $this
     */
    public function setFilterPillsStatus(bool $status): self
    {
        $this->filterPillsStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setFilterPillsEnabled(): self
    {
        $this->setFilterPillsStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setFilterPillsDisabled(): self
    {
        $this->setFilterPillsStatus(false);

        return $this;
    }

    /**
     * @param  bool $status
     *
     * @return $this
     */
    public function setFilterLayout(string $type): self
    {
        if (! in_array($type, ['popover', 'slide-down'], true)) {
            throw new DataTableConfigurationException('Invalid filter layout type');
        }

        $this->filterLayout = $type;

        return $this;
    }

    /**
     * @return $this
     */
    public function setFilterLayoutPopover(): self
    {
        $this->setFilterLayout('popover');

        return $this;
    }

    /**
     * @return $this
     */
    public function setFilterLayoutSlideDown(): self
    {
        $this->setFilterLayout('slide-down');

        return $this;
    }
}
