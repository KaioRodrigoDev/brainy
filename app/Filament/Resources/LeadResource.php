<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\City;
use App\Models\Lead;
use App\Models\State;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

    protected static ?string $pluralModelLabel = 'Leads';

    protected static ?string $slug = 'leads';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('state_id')
                    ->label('Estado')
                    ->required()
                    ->relationship('state', 'name')
                    ->preload()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('city', null)),
                Forms\Components\Select::make('city_id')
                    ->label('Cidade')
                    ->required()
                    ->searchable()
                    ->options(function (callable $get) {
                        $cities = City::where('state_id', $get('state_id'));

                        if (!$cities) {
                            return City::all()->pluck('name', 'id');
                        }
                        // dd($cities->name);
                        return $cities->pluck('name', 'id');
                    }),
                Forms\Components\Select::make('hobbie_id')
                    ->relationship('hobbie', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('state.name')
                    ->label('Estado'),
                Tables\Columns\TextColumn::make('city.name')
                    ->label('Cidade'),
                Tables\Columns\TextColumn::make('hobbie.name'),
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
            'index' => Pages\ManageLeads::route('/'),
        ];
    }
}
