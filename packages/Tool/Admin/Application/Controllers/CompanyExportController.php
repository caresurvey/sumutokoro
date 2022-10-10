<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Tool\Admin\Application\UseCases\Company\ExportUseCase;

class CompanyExportController extends Controller
{
    public function export_xlsx(ExportUseCase $useCase)
    {
        return Excel::download($useCase(), 'company.xlsx');
    }
}
