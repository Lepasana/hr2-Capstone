<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MemoResource\Pages;
use App\Models\Memo;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MemoResource extends Resource
{
    protected static ?string $model = Memo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('employee_id', auth()->user()->employee->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('employee_id')
                    ->default(Auth::user()->employee->id),

                TextInput::make('from')
                    ->required()
                    ->rules('required'),

                TextInput::make('to')
                    ->required()
                    ->rules('required'),

                TextInput::make('subject')
                    ->required()
                    ->rules('required'),

                DatePicker::make('date')
                    ->required()
                    ->rules('required'),

                RichEditor::make('content')
                    ->required()
                    ->rules('required'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('from')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('to')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('subject')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('date')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
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

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canUpdate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMemos::route('/'),
            'create' => Pages\CreateMemo::route('/create'),
            'edit'   => Pages\EditMemo::route('/{record}/edit'),
            'view'   => Pages\ViewMemo::route('/{record}/view'),
        ];
    }
}
