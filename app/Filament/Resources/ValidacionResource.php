<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValidacionResource\Pages;
use App\Models\Validacion;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Hidden;


class ValidacionResource extends Resource
{
    protected static ?string $model = Validacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                View::make('components.temporizador'),
                Hidden::make('tiempo_validacion')->id('tiempo_validacion'),
                TextInput::make('validador')
                    ->default(auth()->user()->name)
                    ->disabled()
                    ->required(),


                TextInput::make('codigo_tienda')->required(),
                TextInput::make('pallet')->required(),
                TextInput::make('bultos')->numeric()->required(),
                TextInput::make('cantidad')->numeric()->required(),
                DatePicker::make('fecha')->required(),
                Select::make('tipo_sf')
                    ->options([
                        'S' => 'Sobrante',
                        'F' => 'Faltante',
                    ])
                    ->required(),
                TextInput::make('codigo_producto')->required(),
                TextInput::make('usuario_picker')->required(),
                TextInput::make('turno')->required(),
                TextInput::make('nombre_picker')->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Exportar Validaciones')
                    ->url(route('validaciones.exportar'))
                    ->openUrlInNewTab()
                    ->label('Exportar Validaciones')
                    ->icon('heroicon-m-arrow-down-tray'),

            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListValidacions::route('/'),
            'create' => Pages\CreateValidacion::route('/create'),
            'edit' => Pages\EditValidacion::route('/{record}/edit'),
        ];
    }
}
