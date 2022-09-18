<?php

namespace Tool\General\Domain\Models\QueryBuilder;

/**
 * Class IsOnly
 * @package Tool\General\Domain\Models\QueryBuilder
 */
class IsOnly
{
    /**
     * @return Int
     */
    public function check(int $count): bool
    {
        try {
            // 現在の件数が1件以下なら処理を止める
            if ($count <= 1) {
                throw new \LogicException('件数が1件以下の場合は処理できません');
            }
            // 問題なければtrueを返す
            return true;
        } catch (\LogicException $e) {
            return false;
        }
    }
}
