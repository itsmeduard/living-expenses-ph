<?php
namespace App\Http\Livewire\RappasoftDatatable;
use App\Http\Livewire\RappasoftDatatable\Commands\MakeCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
class LaravelLivewireTablesServiceProvider extends PackageServiceProvider
{
    /**
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-livewire-tables')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasCommand(MakeCommand::class);
    }
}
