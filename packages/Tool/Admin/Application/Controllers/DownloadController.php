<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Sheet;;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('admin::download.index.contents');
    }


    public function area_center_xlsx(ExportAreaCenterUseCase $useCase)
    {
        return Excel::download($useCase(), 'area_center.xlsx');
    }
}
