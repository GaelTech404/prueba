<?php

namespace App\Http\Controllers;

use App\Models\Validacion;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class ValidacionController extends Controller
{
    public function exportarValidaciones()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados (usa los campos fillable)
        $encabezados = [
            'validador',
            'codigo_tienda',
            'pallet',
            'bultos',
            'cantidad',
            'fecha',
            'tipo_sf',
            'codigo_producto',
            'usuario_picker',
            'turno',
            'nombre_picker',
            'tiempo_validacion',
        ];

        // Escribir encabezados
        foreach ($encabezados as $index => $columna) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index + 1);
            $cell = $colLetter . '1';
            $sheet->setCellValue($cell, ucfirst(str_replace('_', ' ', $columna)));
        }

        // Obtener los datos
        $validaciones = Validacion::all($encabezados);

        // Escribir los datos
        $fila = 2;
        foreach ($validaciones as $validacion) {
            foreach ($encabezados as $index => $campo) {
                $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index + 1);
                $cell = $colLetter . $fila;
                $sheet->setCellValue($cell, $validacion->$campo);
            }
            $fila++;
        }

        // Guardar archivo temporal
        $writer = new Xlsx($spreadsheet);
        $fileName = 'validaciones_' . date('Y-m-d_H-i-s') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        // Descargar archivo
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}
