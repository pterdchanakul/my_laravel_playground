<?php

namespace App\Services\Excels\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExcelExport implements FromQuery, ShouldAutoSize
{
    use Exportable;

    public function __construct(string $productId)
    {
        $this->productId = $productId;
    }

    public function headings(): array
    {
        return [
            'product_name',
            'no_finding',
        ];
    }

    public function map($row): array
    {
        return [
            $row->product_name,
            $row->no_finding
        ];
    }

    public function query()
    {
        return Product::query()->where('id', $this->productId);
    }
}
