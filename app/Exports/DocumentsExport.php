<?php

namespace App\Exports;

use App\Models\Documents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DocumentsExport implements FromView
{
	use Exportable;
    
    public function view(): View
    {
        return view('admin.exportdoc', [
            'documents' => Documents::all()
        ]);
    }

    // public function map($documents): array
    // {

    //     return [
    //         $documents->name,
    //         Date::dateTimeToExcel($documents->created_at),
    //         Date::dateTimeToExcel($documents->updated_at),
    //         $documents->total
    //     ];
    // }

    // public function columnFormats(): array
    // {
    //     return [
    //         'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //     ];
    // }
}
