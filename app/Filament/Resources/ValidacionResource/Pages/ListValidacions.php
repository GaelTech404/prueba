<?php

namespace App\Filament\Resources\ValidacionResource\Pages;

use App\Filament\Resources\ValidacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListValidacions extends ListRecords
{
    protected static string $resource = ValidacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];

    }
    public function getTitle(): string
    {
        return 'Lista de Validaciones'; 
    }

}
