<?php

namespace Tool\Admin\Helpers;

class AdminCommon
{
    /**
     * 表示ボタン
     *
     * @param string $value
     * @return string
     */
    public static function displayToggle(string $model, int $display, int $id)
    {
        // 初期タグ作成
        $result  = '<a href="' . asset('/') . config('myapp.app_admin_prefix') . '/' . e(mb_strtolower($model)) . '/display/' . e($id) . '" class="c-btn c-btn__disabled '. $model . 'Display" id="' . $model . 'Display' . $id . '">';
        $result .= '非表示';
        $result .= '</a>';

        // 表示の場合
        if($display === 1) {
            // タグ作成
            $result  = '<a href="' . asset('/') . config('myapp.app_admin_prefix') . '/' . e(mb_strtolower($model)) . '/display/' . e($id) . '" class="c-btn c-btn__enabled ' . $model . 'Display" id="' . $model . 'Display' . $id . '">';
            $result .= '表　示';
            $result .= '</a>';
        }

        return $result;
    }


    /**
     * コントローラー名取得
     *
     * @return string
     */
      public function getControllerName()
      {
        $controllerName = 'home';
        $route = explode('.', Route::currentRouteName());
        if ($route[0] !== '') $controllerName = $route[0];
        return $controllerName;
      }

    /**
     * アクション名取得
     *
     * @return string
     */
      public function getActionName()
      {
        $actionName = 'index';
        $route = explode('.', Route::currentRouteName());
        if (isset($route[1])) $actionName = $route[1];
        return $actionName;
      }
}
