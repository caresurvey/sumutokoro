<?php

namespace Tool\Common\Domain\Models\Delivery\Mail;

/**
 * テストモードかどうかをチェック
 */
class CheckTestMode
{
    /**
     * 入力されたアドレスがテストモードかどうかチェック
     * test@test.co.jpと入力されていたらテストモードと判定する
     * @return bool
     */
    public function checkTest(string $mail): bool
    {
        if($mail === 'test@test.co.jp') return true;
        return false;
    }
}