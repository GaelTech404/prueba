<?php

namespace App\Filament\Resources\ValidacionResource\Pages;

use App\Filament\Resources\ValidacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditValidacion extends EditRecord
{
    protected static string $resource = ValidacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
