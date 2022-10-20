<?php

namespace Tool\Common\Helpers;

use Illuminate\Support\Facades\Auth;

class LogHelper
{
    /**
     * ログ保存データを作成
     */
    public static function makeLogData(array $post, string $prefix, string $page, string $action, int $id, string $value, array $auth): array
    {
        // POSTが配列ならserializeする
        if(is_array($post)) $post = serialize($post);

        // IPを設定する
        $ip = '';
        if(!empty($_SERVER["REMOTE_ADDR"])) $ip = $_SERVER["REMOTE_ADDR"];

        return [
            'log' => $post,
            'prefix' => $prefix,
            'page' => $page,
            'action' => $action,
            'column_id' => $id,
            'value' => $value,
            'user_name' => $auth['name'],
            'user_id' => $auth['id'],
            'ip' => $ip,
        ];
    }

    /**
     * ログ保存データを作成（画像用）
     */
    public static function makeLogDataForImage(array $post, string $prefix, string $page, string $action, int $id, string $value, array $auth): array
    {
        // base64を消す
        $post['upload'] = '';

        // POSTが配列ならserializeする
        if(is_array($post)) $post2 = serialize($post);


        // IPを設定する
        $ip = '';
        if(!empty($_SERVER["REMOTE_ADDR"])) $ip = $_SERVER["REMOTE_ADDR"];

        return [
            'log' => $post2,
            'prefix' => $prefix,
            'page' => $page,
            'action' => $action,
            'column_id' => $id,
            'value' => $value,
            'user_name' => $auth['name'],
            'user_id' => $auth['id'],
            'ip' => $ip,
        ];
    }

    /**
     * ログ保存データを作成（ログイン・ログアウト用）
     */
    public static function makeLogDataForAuthenticate(array $post, string $prefix, string $page, string $action, int $id, string $value): array
    {
        // POSTが配列ならserializeする
        if(is_array($post)) $post2 = serialize($post);

        // IPを設定する
        $ip = '';
        if(!empty($_SERVER["REMOTE_ADDR"])) $ip = $_SERVER["REMOTE_ADDR"];

        return [
            'log' => $post2,
            'prefix' => $prefix,
            'page' => $page,
            'action' => $action,
            'column_id' => $id,
            'value' => $value,
            'user_name' => $post['name'],
            'user_id' => $id,
            'ip' => $ip,
        ];
    }
}