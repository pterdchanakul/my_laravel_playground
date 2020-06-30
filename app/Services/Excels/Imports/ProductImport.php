<?php

namespace App\Services\Excels\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use App\Product;

class ProductImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Product([
            'product_name' => $row['image_index'],
            '1' => $row['atelectasis'],
            '2' => $row['cardiomegaly'],
            '3' => $row['effusion'],
            '4' => $row['infiltration'],
            '5' => $row['mass'],
            '6' => $row['nodule'],
            '7' => $row['pneumonia'],
            '8' => $row['pneumothorax'],
            '9' => $row['consolidation'],
            '10' => $row['edema'],
            '11' => $row['emphysema'],
            '12' => $row['fibrosis'],
            '13' => $row['pleural_thickening'],
            '14' => $row['hernia'],
            '15' => $row['no_finding']
        ]);
    }

    public function chunkSize(): int
    {
        return 3000;
    }

    public function batchSize(): int
    {
        return 3000;
    }
}
