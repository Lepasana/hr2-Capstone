<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\TimeAndAttendance;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TimeAndAttendanceResource\Pages;
use App\Filament\Resources\TimeAndAttendanceResource\RelationManagers;

class TimeAndAttendanceResource extends Resource
{
  protected static ?string $model = TimeAndAttendance::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TimePicker::make('time_in')
          ->label('Time In')
          ->required(),

        TimePicker::make('time_out')
          ->label('Time Out')
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('time_in')
          ->label('Time In')
          ->sortable(),

        TextColumn::make('time_out')
          ->label('Time Out')
          ->sortable(),

        TextColumn::make('total_hours_work')
          ->label('Total Hours Worked')
          ->sortable(),
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
      'index' => Pages\ListTimeAndAttendances::route('/'),
      'create' => Pages\CreateTimeAndAttendance::route('/create'),
      'edit' => Pages\EditTimeAndAttendance::route('/{record}/edit'),
    ];
  }

  protected function calculateTotalHours(callable $set)
  {
    $timeIn = $this->form->getState()['time_in'];
    $timeOut = $this->form->getState()['time_out'];

    if ($timeIn && $timeOut) {
      $timeIn = Carbon::parse($timeIn);
      $timeOut = Carbon::parse($timeOut);

      $totalHours = $timeOut->diffInHours($timeIn);
      $set('total_hours_work', $totalHours);
    } else {
      $set('total_hours_work', 0);
    }
  }
}
