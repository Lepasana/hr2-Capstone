<?php

namespace App\Filament\Resources;

use App\Enums\LeaveTypeEnum;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\FileLeave;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FileLeaveResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FileLeaveResource\RelationManagers;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class FileLeaveResource extends Resource
{
  protected static ?string $model = FileLeave::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  protected static ?string $navigationGroup = "Leave Management";

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
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
      'index' => Pages\ListFileLeaves::route('/'),
      'create' => Pages\CreateFileLeave::route('/create'),
      'edit' => Pages\EditFileLeave::route('/{record}/edit'),
    ];
  }
}
