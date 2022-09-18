<?php

namespace Tool\Admin\Domain\Models\User;

use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentUser;

/**
 * Class CanBeDeleteUser
 * ユーザーが削除できるかどうかのチェック
 * @package Tool\Admin\Domain\Models\QueryBuilder
 */
class CanBeUserDelete
{
    /**
     * @return Int
     */
    public function isCanBe(int $id, EloquentUser $eloquent): bool
    {
        // 削除対象ユーザーの関連データがあるかどうかのフラグ
        $flg = true;

        // 削除しようとしているユーザーのデータを取得
        $data = $eloquent->where('id', $id)
            ->withCount(
                'blogs',
                'blog_categories',
                'configs',
                'forms',
                'news',
                'news_categories',
                'recruits',
                'role',
                'users'
            )->first();

        // データがない場合例外を投げる
        if (empty($data)) throw new AdminNotFoundException();

        // 関連データが一つでもあればフラグをたてる
        if($data['blogs_count'] > 0) $flg = false;
        if($data['blog_categories_count'] > 0) $flg = false;
        if($data['configs_count'] > 0) $flg = false;
        if($data['forms_count'] > 0) $flg = false;
        if($data['news_count'] > 0) $flg = false;
        if($data['news_categories_count'] > 0) $flg = false;
        if($data['recruits_count'] > 0) $flg = false;
        if($data['roles_count'] > 0) $flg = false;
        if($data['users_count'] > 0) $flg = false;

        return $flg;
    }
}
