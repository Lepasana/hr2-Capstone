<?php
namespace App\Filament\Resources;

use App\Enums\LeaveStatusEnum;
use App\Enums\LeaveTypeEnum;
use App\Filament\Resources\FileLeaveResource\Pages;
use App\Models\FileLeave;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FileLeaveResource extends Resource
{
    protected static ?string $model = FileLeave::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Leave Management";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('employee_id')
                    ->default(auth()->user()->employee->id),

                Hidden::make('project_name')
                    ->default(auth()->user()->employee->jobPosition->title),

                Select::make('leave_type')
                    ->label('Leave Type')
                    ->options(LeaveTypeEnum::toOptions())
                    ->required(),

                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),

                Hidden::make('status')
                    ->default(LeaveStatusEnum::PENDING->value),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('leave_type')
                    ->label('Leave Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('end_date')
                    ->label('End Date')
                    ->date()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending'                         => 'warning',
                        'Approved'                        => 'success',
                        'Rejected'                        => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index'  => Pages\ListFileLeaves::route('/'),
            'create' => Pages\CreateFileLeave::route('/create'),
            'edit'   => Pages\EditFileLeave::route('/{record}/edit'),
        ];
    }
}
