<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Tool\Admin\Application\UseCases\Spot\ExportUseCase;

class SpotExportController extends Controller
{
    public function export_general_xlsx(ExportUseCase $useCase)
    {
        return Excel::download($useCase(), 'spot.xlsx');
    }
}
