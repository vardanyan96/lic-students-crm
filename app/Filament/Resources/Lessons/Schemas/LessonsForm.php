<?php

namespace App\Filament\Resources\Lessons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LessonsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->required(),
                TextInput::make('teacher_name')
                    ->required(),
                TextInput::make('second_teacher_name')
                    ->required(),
                DateTimePicker::make('datetime')
                    ->required(),
                Toggle::make('status')
            ]);
    }
}
