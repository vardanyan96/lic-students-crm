<?php

namespace App\Filament\Resources\Lessons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class LessonsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('teacher_name')
                        ->required(),
                    TextInput::make('second_teacher_name')
                        ->required(),
                    DateTimePicker::make('datetime')
                        ->required(),
                    Toggle::make('status'),
                    Select::make('users')
                        ->multiple()
                        ->relationship('users', 'name', modifyQueryUsing: fn (Builder $query) => $query->where('role_name','=','student'),)
                        ->required()
                        ->preload()

                ])->columnSpanFull()

            ]);
    }
}
