<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->boolean('preview')->default(0)->comment('プレビュー');
            $table->string('name', 255)->comment('名称');
            $table->string('longname', 255)->comment('正式名称');
            $table->string('zip1', 3)->comment('郵便番号1');
            $table->string('zip2', 4)->comment('郵便番号2');
            $table->string('address', 255)->comment('住所');
            $table->string('tel1', 5)->comment('電話番号1');
            $table->string('tel2', 5)->comment('電話番号2');
            $table->string('tel3', 5)->comment('電話番号3');
            $table->unsignedInteger('vacancy')->default(1)->comment('空室の状態 [1:指定なし|2:空きあり|3:空きなし|4:要問合せ]');
            $table->unsignedInteger('document')->default(1)->comment('資料の状態 [1:指定なし|2:資料あり|3:資料なし|4:要問合せ]');
            $table->unsignedInteger('viewing')->default(1)->comment('見学予約の状態 [1:指定なし|2:見学予約可能|3:見学予約不可|4:要問合せ]');
            $table->unsignedInteger('is_book')->default(1)->comment('掲載する／掲載しない]');
            $table->boolean('is_meeting')->default(0)->comment('やり取り中');
            $table->text('heading')->comment('見出し');
            $table->text('message')->comment('メッセージ');
            $table->unsignedInteger('monthly_price_min')->default(1)->comment('月額最低金額');
            $table->unsignedInteger('monthly_price_max')->default(1)->comment('月額最高金額');
            $table->boolean('for_check_monthly')->default(0)->comment('月額金額の間の〜');
            $table->unsignedInteger('movein_price_min')->default(1)->comment('入居時最低金額');
            $table->unsignedInteger('movein_price_max')->default(1)->comment('入居時最高金額');
            $table->boolean('for_check_movein')->default(0)->comment('入居時金額の間の〜');
            $table->boolean('is_selfpay')->default(0)->comment('介護自己負担を月額費用に含む');
            $table->string('room_size', 255)->comment('部屋サイズ');
            $table->decimal('lat', 17,14)->default('43.76281006321748')->comment('LAT');
            $table->decimal('lng', 17,14)->default('142.35817790725756')->comment('LNG');
            $table->text('search_words')->comment('検索用テキスト（保存時に自動作成）');
            $table->unsignedInteger('area_branch_id')->default(1)->comment('振興局ID');
            $table->unsignedInteger('category_id')->default(1)->comment('種別ID');
            $table->unsignedInteger('city_id')->default(1)->comment('市町村ID');
            $table->unsignedInteger('company_id')->default(1)->comment('法人ID');
            $table->unsignedInteger('spot_plan_id')->default(1)->comment('プランID');
            $table->unsignedInteger('prefecture_id')->default(1)->comment('都道府県ID');
            $table->unsignedInteger('price_range_id')->default(1)->comment('金額幅ID');
            $table->unsignedInteger('space_id')->default(1)->comment('部屋の広さID');
            $table->unsignedInteger('trade_area_id')->default(1)->comment('商圏ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
            $table->foreign('area_branch_id')
              ->references('id')
              ->on('area_branches');
            $table->foreign('category_id')
              ->references('id')
              ->on('categories');
            $table->foreign('city_id')
              ->references('id')
              ->on('cities');
            $table->foreign('company_id')
              ->references('id')
              ->on('companies');
            $table->foreign('prefecture_id')
              ->references('id')
              ->on('prefectures');
            $table->foreign('price_range_id')
              ->references('id')
              ->on('price_ranges');
            $table->foreign('spot_plan_id')
              ->references('id')
              ->on('spot_plans');
            $table->foreign('space_id')
              ->references('id')
              ->on('spaces');
            $table->foreign('trade_area_id')
              ->references('id')
              ->on('trade_areas');
            $table->foreign('user_id')
              ->references('id')
              ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spots', function (Blueprint $table) {
            $table->dropForeign('spots_area_branch_id_foreign');
            $table->dropForeign('spots_city_id_foreign');
            $table->dropForeign('spots_company_id_foreign');
            $table->dropForeign('spots_prefecture_id_foreign');
            $table->dropForeign('spots_price_range_id_foreign');
            $table->dropForeign('spots_spot_plan_id_foreign');
            $table->dropForeign('spots_space_id_foreign');
            $table->dropForeign('spots_trade_area_id_foreign');
            $table->dropForeign('spots_user_id_foreign');
        });
        Schema::dropIfExists('spots');
    }
};
