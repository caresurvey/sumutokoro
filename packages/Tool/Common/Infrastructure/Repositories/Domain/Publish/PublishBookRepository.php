<?php

namespace Tool\Common\Infrastructure\Repositories\Domain\Publish;

use Tool\Common\Domain\Models\Book\BookRepository;
use Tool\Common\Domain\Models\Book\Preview\Preview;
use Tool\Common\Exceptions\CommonNotFoundException;
use Tool\Common\Infrastructure\Eloquents\EloquentSpot;
use DB;

class PublishBookRepository implements BookRepository
{
    private EloquentSpot $eloquentSpot;
    private string $imgPath;
    private string $photoPath;

    public function __construct(
        EloquentSpot $eloquentSpot,
    )
    {
        $this->eloquentSpot = $eloquentSpot;
        $this->imgPath = config('myapp.app_url') . '/img/common/book/preview';
        $this->photoPath = config('myapp.app_url') . '/photos';
    }

    public function makePreview(int $id, string $token, array $categories, array $cities): string
    {
        // 必要データの取得
        $spot = $this->eloquentSpot->where('id', $id)
            ->where('preview', 1)
            ->with(
                'area_center.area',
                'book_spot',
                'category',
                'city',
                'company',
                'spot_main_image',
                'prefecture',
                'spot_detail',
                'spot_main_image',
                'spot_icon_genre_comments',
                'spot_icon_statuses.spot_icon_type',
                'spot_icon_statuses.spot_icon_item',
                'spot_plan',
                'spot_prices.price_genre',
                'space',
                'user'
            )
            ->first();

        // トークンが合わない場合
        if(md5($spot->id.$spot->name) !== $token) throw new CommonNotFoundException();

        // データがない場合
        if (empty($spot)) throw new CommonNotFoundException();

        // previewモデルを作成する
        $preview = new Preview($this->imgPath, $this->photoPath, $spot->toArray());

        // タグを返す
        return $preview->makeTag();
    }
}
