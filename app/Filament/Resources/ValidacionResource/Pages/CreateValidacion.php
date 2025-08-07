<?php

namespace App\Filament\Resources\ValidacionResource\Pages;

use App\Filament\Resources\ValidacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Facades\Filament;

class CreateValidacion extends CreateRecord
{
    protected static string $resource = ValidacionResource::class;
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['validador'] = Filament::auth()->user()->name;
        return $data;
    }
    
}
