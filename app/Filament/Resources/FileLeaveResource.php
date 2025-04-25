<?php
namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\FileLeave;
use Filament\Tables\Table;
use App\Enums\LeaveTypeEnum;
use App\Enums\LeaveStatusEnum;
use Filament\Resources\Resource;
use App\Enums\EmployeeGenderEnum;
use Filament\Forms\Components\Field;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\FileLeaveResource\Pages;

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
                    ->options(function (callable $get) {
                        $gender = Auth::user()->employee->gender; // Assuming 'gender' field exists in the form

                        return collect(LeaveTypeEnum::cases())
                            ->filter(function ($case) use ($gender) {
                                if ($gender === EmployeeGenderEnum::MALE->value) {
                                    return $case !== LeaveTypeEnum::MATERNITY_LEAVE;
                                }

                                if ($gender === EmployeeGenderEnum::FEMALE->value) {
                                    return $case !== LeaveTypeEnum::PATERNITY_LEAVE;
                                }

                                return true;
                            })
                            ->mapWithKeys(fn($case) => [$case->value => $case->value])
                            ->toArray();
                    })
                    ->required(),

                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required()
                    ->native(false)
                    ->disabledDates(function () {
                        $today = Carbon::today();
                        $dates = [];

                        // Block all dates before today (last 365 days, you can go further if needed)
                        for ($i = 1; $i <= 365; $i++) {
                            $dates[] = $today->copy()->subDays($i)->toDateString();
                        }

                        return $dates;
                    }),

                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required()
                    ->afterOrEqual('start_date')
                    ->native(false)
                    ->disabledDates(function () {
                        $today = Carbon::today();
                        $dates = [];

                        // Block all dates before today (last 365 days, you can go further if needed)
                        for ($i = 1; $i <= 365; $i++) {
                            $dates[] = $today->copy()->subDays($i)->toDateString();
                        }

                        return $dates;
                    }),

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
