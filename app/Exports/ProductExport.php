<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Product::whereBetween('created_at', [$this->startDate, $this->endDate])->get(['name', 'price', 'created_at']);
    }

    public function headings(): array
    {
        return ['Name', 'Price', 'Created At'];
    }
}
