<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\Admin\Application\UseCases\Download\CompanyUseCase;
use Tool\Admin\Application\UseCases\Download\SpotUseCase;

class DownloadController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('admin::download.index.contents');
    }

    public function spot_csv(SpotUseCase $useCase): array
    {
        return $useCase();
    }

    public function company_csv(CompanyUseCase $useCase): array
    {
        return $useCase();
    }
}
