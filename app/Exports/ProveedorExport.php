<?php

namespace App\Exports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProveedorExport implements FromCollection, WithStyles, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Proveedor::all();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilos para el encabezado
            1    => ['font' => ['bold' => true]],

            // Estilos para las filas de datos
            'A'  => ['font' => ['italic' => true]],
            'B'  => ['font' => ['italic' => true]],
            'C'  => ['font' => ['italic' => true]],
            // Ajusta más columnas según sea necesario
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Email',
            'Teléfono',
            'Fecha de creación',
            'Fecha de actualización',
        ];
    }
}
