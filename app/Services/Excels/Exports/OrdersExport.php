<?php

namespace App\Services\Excels\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function __construct(string $orderNumber)
    {
        $this->orderId = $orderNumber;
    }

    public function headings(): array
    {
        return [
            'order_number',
            'buyer',
            'seller',
            'product_name',
            'amount',
            'total_price'
        ];
    }

    public function map($row): array
    {
        return [
            $row->order_number,
            $row->seller,
            $row->buyer,
            $row->product_name,
            $row->amount,
            $row->total_price
        ];
    }

    public function query()
    {
        return Order::query()->where('order_number', $this->orderId);
    }
}
