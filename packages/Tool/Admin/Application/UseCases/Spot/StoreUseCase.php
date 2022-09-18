<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Application\Requests\Spot\StoreRequest;
use Tool\Admin\Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository;
use Tool\Admin\Domain\Models\SpotIconStatus\SpotIconStatusRepository;
use Tool\Admin\Domain\Models\SpotPrice\SpotPriceRepository;

class StoreUseCase
{
    private StoreRequest $request;
    private SpotRepository $spotRepo;
    private SpotPriceRepository $spotPriceRepo;
    private SpotIconGenreCommentRepository $spotIconGenreCommentRepo;
    private SpotIconStatusRepository $spotIconStatusRepo;

    public function __construct(
        StoreRequest                   $request,
        SpotRepository                 $spotRepo,
        SpotPriceRepository            $spotPriceRepo,
        SpotIconGenreCommentRepository $spotIconGenreCommentRepo,
        SpotIconStatusRepository       $spotIconStatusRepo
    )
    {
        $this->request = $request;
        $this->spotRepo = $spotRepo;
        $this->spotPriceRepo = $spotPriceRepo;
        $this->spotIconGenreCommentRepo = $spotIconGenreCommentRepo;
        $this->spotIconStatusRepo = $spotIconStatusRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // 登録用アイコンモデル作成
        $emptyData['spotIconStatus'] = $this->spotIconStatusRepo->makeStoreData();

        // 登録用アイコンジャンルコメントモデル作成
        $emptyData['spotIconGenreComment'] = $this->spotIconGenreCommentRepo->makeStoreData();

        // 登録用料金モデル作成
        $emptyData['spotPrice'] = $this->spotPriceRepo->makeStoreData();

        // リクエスト形成
        $request = $this->request->data();
        $request['search_words'] = $this->request->getSearchWords();

        // 保存して結果を返す
        return $this->spotRepo->store($request, $emptyData, $auth);
    }
}
