<?php
namespace App\Filament\Resources;

use App\Filament\Exports\PayrollExporter;
use App\Filament\Resources\PayrollResource\Pages;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Exports\ExportColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class PayrollResource extends Resource
{
    protected static ?string $model = Payroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('employee_id', auth()->user()->employee->id)
            ->where('generate_payslip', true);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code'),

                TextInput::make('from'),

                TextInput::make('to'),

                TextInput::make('basic_salary_amount')
                    ->label('Basic Salary Amount'),

                TextInput::make('reg_ot_amount')
                    ->label('Regular OT'),

                TextInput::make('rd_ot_amount')
                    ->label('Rest Day OT'),

                TextInput::make('sss')
                    ->label('SSS'),

                TextInput::make('philhealth')
                    ->label('PhilHealth'),

                TextInput::make('pag_ibig'),

                TextInput::make('total_deductions')
                    ->label('Total Deductions'),

                TextInput::make('total_earnings')
                    ->label('Total Earnings'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('from')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('to')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('basic_salary_amount')
                    ->label('Basic Salary Amount')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('reg_ot_amount')
                    ->label('Regular OT')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('rd_ot_amount')
                    ->label('Rest Day OT')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('sss')
                    ->label('SSS')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('philhealth')
                    ->label('PhilHealth')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pag_ibig')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_deductions')
                    ->label('Total Deductions')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_earnings')
                    ->label('Total Earnings')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('View Payslip')
                        ->url(function ($record) {
                            return URL::to(route('filament.admin.resources.payrolls.view-payslip', $record->id));
                        }),

                    Action::make('Generate PDF')
                        ->label('Download Payslip')
                        ->icon('heroicon-m-arrow-down-tray')
                        ->color('primary')
                        ->action(function ($record) {
                            // Generate PDF
                            $pdf = Pdf::loadView('pdf.payslip', ['payroll' => $record]);

                            // Store the PDF (Optional: Save to Storage)
                            $fileName = "payslip-{$record->id}.pdf";
                            Storage::put("public/payslips/{$fileName}", $pdf->output());

                            // Download the PDF
                            return response()->streamDownload(
                                fn() => print($pdf->output()),
                                $fileName
                            );
                        }),
                ])
                    ->label('More actions')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exporter(PayrollExporter::class),
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
            'index'        => Pages\ListPayrolls::route('/'),
            'create'       => Pages\CreatePayroll::route('/create'),
            'edit'         => Pages\EditPayroll::route('/{record}/edit'),
            'view-payslip' => Pages\ViewPayslip::route('/{record}/view-payslip'),
        ];
    }

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name'),
            ExportColumn::make('sku')
                ->label('SKU'),
            ExportColumn::make('price'),
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

}
