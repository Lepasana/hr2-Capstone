<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Timesheet;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TimesheetResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use App\Filament\Resources\TimesheetResource\RelationManagers;

class TimesheetResource extends Resource
{
    protected static ?string $model = Timesheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('employee_id', auth()->user()->employee->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TimePicker::make('time_in')
                    ->label('Time In'),

                TimePicker::make('time_out')
                    ->label('Time Out'),

                TextInput::make('total_hours_work')
                    ->label('Total Hours of Work'),

                TextInput::make('number_of_absent')
                    ->label('Number of Absent'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('time_in')
                    ->label('Time In')
                    ->date('H:i A')
                    ->sortable(),

                TextColumn::make('time_out')
                    ->label('Time Out')
                    ->date('h:i A')
                    ->sortable(),

                TextColumn::make('total_hours_work')
                    ->label('Total Hours of Work')
                    ->sortable(),

                TextColumn::make('number_of_absent')
                    ->label('Number of Absent')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTimesheets::route('/'),
            'create' => Pages\CreateTimesheet::route('/create'),
            'edit' => Pages\EditTimesheet::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
