<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Obras');


/* Sheet With Cell's */
$sheet->setCellValue('A2', 'Código/Nome');
$sheet->setCellValue('B2', 'Empresa');
$sheet->setCellValue('C2', 'Endereço');
$sheet->setCellValue('D2', 'Responsável');
$sheet->setCellValue('E2', 'Registro');
$sheet->setCellValue('F2', 'Situação');

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath('assets/images/icon/logo.png'); // put your path and image here
$drawing->setCoordinates('A1');
$drawing->setOffsetX(10);
$drawing->setOffsetY(10);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$writer = new Xlsx($spreadsheet);

$sheet
    ->getRowDimension('1')
    ->setRowHeight(70, 'pt');

    $sheet
    ->getRowDimension('2')
    ->setRowHeight(30, 'pt');    

$sheet->rows = 3;
foreach($data as $row){

    $situacao = $this->get_situacao($row->situacao);

    $sheet->setCellValue("A{$sheet->rows}", $row->codigo_obra);
    $sheet->setCellValue("B{$sheet->rows}", $row->empresa);
    $sheet->setCellValue("C{$sheet->rows}", "{$row->endereco}, {$row->endereco_numero} - {$row->endereco_bairro} - {$row->endereco_cidade}");
    $sheet->setCellValue("D{$sheet->rows}", $row->responsavel);
    $sheet->setCellValue("E{$sheet->rows}", date('d/m/Y', strtotime($row->data_criacao)));
    $sheet->setCellValue("F{$sheet->rows}", $situacao['texto']);
    $sheet->getRowDimension($sheet->rows)->setRowHeight(20, 'pt');

    $sheet->rows++;
}


$sheet->getStyle("A2:F2")
->getFill()
->setFillType(Fill::FILL_SOLID)
->getStartColor()
->setARGB("CCCCCC");

foreach (range('A', 'F') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

$sheet->getStyle("A2:F2")
    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle("A2:F2")
    ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


return true;