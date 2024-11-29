<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Compensation;
use Filament\Resources\Resource;
use App\Enums\CompensationTypeEnum;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompensationResource\Pages;
use App\Filament\Resources\CompensationResource\RelationManagers;

class CompensationResource extends Resource
{
  protected static ?string $model = Compensation::class;

  protected static bool $shouldRegisterNavigation = false;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Hidden::make('employee_id')
          ->default(auth()->user()->id),

        TextInput::make('project_name')
          ->label('Project Name')
          ->required(),

        Select::make('compensation_type')
          ->options(CompensationTypeEnum::toOptions())
          ->required(),

        TextInput::make('amount')
          ->required()
          ->numeric(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('project_name')
          ->label('Project Name')
          ->searchable()
          ->sortable(),

        TextColumn::make('compensation_type')
          ->label('Compensation Type')
          ->searchable()
          ->sortable(),

        TextColumn::make('amount')
          ->sortable()
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
      'index' => Pages\ListCompensation::route('/'),
      'create' => Pages\CreateCompensation::route('/create'),
      'edit' => Pages\EditCompensation::route('/{record}/edit'),
    ];
  }
}
