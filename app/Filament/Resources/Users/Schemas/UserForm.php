<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('surname')
                            ->required(),
                        TextInput::make('patronymic')
                            ->required(),
                        TextInput::make('password'),
                        TextInput::make('email'),
                    ])
                    ->columns(2)
                    ->columnSpan(['lg' => 2]),

            ])->columns(3);
    }
}
