<?php

namespace App\Services\Excels\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use App\Product;

class ProductImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{

    public function model(array $row)
    {
        return new Product([
            'product_name' => $row['image_index'],
            'atelectasis' => $row['atelectasis'],
            'cardiomegaly' => $row['cardiomegaly'],
            'effusion' => $row['effusion'],
            'infiltration' => $row['infiltration'],
            'mass' => $row['mass'],
            'nodule' => $row['nodule'],
            'pneumonia' => $row['pneumonia'],
            'pneumothorax' => $row['pneumothorax'],
            'consolidation' => $row['consolidation'],
            'edema' => $row['edema'],
            'emphysema' => $row['emphysema'],
            'fibrosis' => $row['fibrosis'],
            'pleural_thickening' => $row['pleural_thickening'],
            'hernia' => $row['hernia'],
            'no_finding' => $row['no_finding']
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
