<?php

namespace Tool\Common\Helpers;

use Carbon\Carbon;

class TextHelper
{
    /**
     * TIMESTAMPを日付のみの日本語表記にする
     *
     * @return string
     * @var string
     */
    public static function dateFormatJp(string $var): string
    {
        // フォーマットを変換して返す
        return date('Y年m月d日', strtotime($var));
    }

    /**
     * TIMESTAMPを日時の日本語表記にする
     *
     * @return string
     * @var string
     */
    public function datetimeFormatJp(string $var): string
    {
        // フォーマットを変換して返す
        return date('Y年m月d日 H時i分s秒', strtotime($var));
    }

    /**
     * 日付が1週間以内かどうかチェック
     *
     * @return string
     * @var bool
     */
    public function judgeWithinOneWeek(string $var): bool
    {
        // 1週間前の日付を取得
        $today = new Carbon('today');

        // チェックの日付を取得
        $checkdate = new Carbon($var);

        // 日付を比較して1週間以上だったらfalse
        if ($today->diffInDays($checkdate) > 7) {
            return false;
        }

        // 1週間以内ならtrue
        return true;
    }
}
