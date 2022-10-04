<?php

namespace Tool\Admin\Application\UseCases\Book;

use Tool\Admin\Application\Requests\Book\PublishRequest;
use Tool\Admin\Domain\Models\AreaCenter\AreaCenterRepository;
use Tool\Admin\Domain\Models\Book\BookRepository;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Common\ResponseRepository;
use Tool\Admin\Domain\Models\Spot\PublishSpotRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use Tool\Admin\Jobs\PublishBookJob;

class PublishUseCase
{
    private BookRepository $bookRepo;
    private AreaCenterRepository $areaCenterRepo;
    private PublishSpotRepository $publishSpotRepo;
    private ResponseRepository $responseRepo;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private PublishRequest $request;

    public function __construct(
        PublishRequest $request,
        AreaCenterRepository $areaCenterRepo,
        BookRepository $bookRepo,
        PublishSpotRepository $publishSpotRepo,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        ResponseRepository $responseRepo,
    )
    {
        $this->request = $request;
        $this->areaCenterRepo = $areaCenterRepo;
        $this->bookRepo = $bookRepo;
        $this->publishSpotRepo = $publishSpotRepo;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->responseRepo = $responseRepo;
    }

    public function __invoke(): LogicResponse
    {
        // リレーション用のデータを取得
        $categories = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $cities = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        // 印刷の条件モデル作成
        $conditions = $this->bookRepo->makeFormatConditions($this->request->all());

        // 対象のarea_centerデータを取得
        $area_centers = $this->areaCenterRepo->getBookData($conditions->getAreaSectionId());

        // 対象のbookデータを取得
        $book = $this->bookRepo->getDataByAreaSection($conditions);

        // area_centerデータを元に出力するspotデータのモデルを取得
        $elementarySpot = $this->publishSpotRepo->getPublishSpots($area_centers, $conditions);

        // 印刷対象spotデータを取得
        $allSpots = $this->publishSpotRepo->makePublishSpots($elementarySpot, $conditions);

        // 対象指定範囲だけにする
        $spots = $this->publishSpotRepo->pickupPublishSpots($allSpots, $conditions);

        // キュー用にデータを分割する
        $queueSpots = $this->publishSpotRepo->splitSpotByQueue($spots);

        // DirNameに使う日付の指定
        $dirNameDate = date("ymdhis");

        // あるだけキューに登録する
        $currentQueue = 0;
        foreach($queueSpots as $queueSpot) {
            // Publishモデルを作成
            $publish = $this->bookRepo->makeFormat($conditions, $queueSpot, $book, $currentQueue, $dirNameDate);

            // キュー登録する
            PublishBookJob::dispatch($publish);

            // キューカウントをアップする
            $currentQueue++;
        }

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', '冊子出力の設定をしました。一定時間の後処理が完了しますので、しばらくお待ち下さい', ['id' => 1, 'name' => '', 'backlink' => 'book/input']);
    }
}
