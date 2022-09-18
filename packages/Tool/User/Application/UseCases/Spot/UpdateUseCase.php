<?php

namespace Tool\User\Application\UseCases\Spot;

use Tool\User\Application\Requests\Spot\UpdateRequest;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;

class UpdateUseCase
{
    private EloquentCity $eloquentCity;
    private UpdateRequest $request;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentCity $eloquentCity,
        UpdateRequest $request,
        SpotRepository $spotRepo
    )
    {
        $this->eloquentCity = $eloquentCity;
        $this->request = $request;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // データ取得
        $cities = $this->eloquentCity->where('display', 1)->pluck('name', 'id')->toArray();

        // リクエスト形成
        $request = $this->request->all();
        $request['icons'] = $this->request->getSpotIconStatuses();
        $request['prices'] = $this->request->getSpotPrices();
        $request['search_words'] = $this->request->getSearchWords($request['spot']['city_id'], $cities);

        // 保存して結果を返す
        return $this->spotRepo->update($request, $auth);
    }
}
