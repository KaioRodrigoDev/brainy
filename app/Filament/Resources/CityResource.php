<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Filament\Resources\CityResource\RelationManagers;
use App\Models\City;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    protected static ?int $navigationSort = 2;

    protected static ?string $pluralModelLabel = 'Cidades';

    protected static ?string $slug = 'cidades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('state_id')
                    ->relationship('state', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Estado'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Cidade')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Cidade'),
                Tables\Columns\TextColumn::make('state.name')
                    ->label('Estado'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criando em')
                    ->dateTime('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCities::route('/'),
        ];
    }
}
