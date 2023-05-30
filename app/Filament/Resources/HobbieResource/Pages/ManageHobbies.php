<?php

namespace App\Filament\Resources\HobbieResource\Pages;

use App\Filament\Resources\HobbieResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHobbies extends ManageRecords
{
    protected static string $resource = HobbieResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
