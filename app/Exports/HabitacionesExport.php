<?php

namespace App\Exports;

use App\Models\Habitacion;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HabitacionesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $searchTerm;
    protected $startDate;
    protected $endDate;

    public function __construct($searchTerm, $startDate, $endDate)
    {
        $this->searchTerm = $searchTerm;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getProtection()->setSheet(false);
            },
        ];
    }
    
    public function collection()
    {
        $query = Habitacion::query()
            ->select('id', 'numero', 'piso', 'created_at');

        if ($this->searchTerm) {
            $query->where(function ($query) {
                $query->where('numero', 'LIKE', "%{$this->searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$this->searchTerm}%");
            });
        }

        if ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        return $query->get();
    }


    public function headings(): array
    {
        return ['ID', 'Numero', 'Piso', 'Created At'];
    }

}
