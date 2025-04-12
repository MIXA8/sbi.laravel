<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportProductsToExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $fileName;

    public function __construct(string $fileName = 'products_export.xlsx')
    {
        $this->fileName = $fileName;
    }

    public function handle(): void
    {
        Excel::store(new ProductsExport, $this->fileName, 'public');
    }
}
