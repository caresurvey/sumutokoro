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
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->boolean('preview')->default(0)->comment('プレビュー');
            $table->string('name', 255)->comment('名称');
            $table->string('longname', 255)->comment('正式名称');
            $table->string('kana', 255)->comment('名称ふりがな');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('zip1', 3)->comment('郵便番号1');
            $table->string('zip2', 4)->comment('郵便番号2');
            $table->string('address', 255)->comment('住所');
            $table->string('tel1', 5)->comment('電話番号1');
            $table->string('tel2', 5)->comment('電話番号2');
            $table->string('tel3', 5)->comment('電話番号3');
            $table->string('fax', 255)->comment('FAX番号');
            $table->decimal('lat', 17,14)->comment('LAT');
            $table->decimal('lng', 17,14)->comment('LNG');
            $table->text('search_words')->comment('検索用テキスト（保存時に自動作成）');
            $table->text('msg')->comment('メモ');
            $table->string('start', 255)->comment('開始');
            $table->string('president', 255)->comment('代表者');
            $table->text('history')->comment('やりとり履歴');
            $table->string('capital', 255)->comment('親会社');
            $table->string('staff', 255)->comment('スタッフ情報');
            $table->unsignedInteger('area_branch_id')->default(1)->comment('振興局ID');
            $table->unsignedInteger('city_id')->default(1)->comment('市町村ID');
            $table->unsignedInteger('prefecture_id')->default(1)->comment('都道府県ID');
            $table->unsignedInteger('trade_area_id')->default(1)->comment('商圏ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
            $table->foreign('area_branch_id')
              ->references('id')
              ->on('area_branches');
            $table->foreign('city_id')
              ->references('id')
              ->on('cities');
            $table->foreign('prefecture_id')
              ->references('id')
              ->on('prefectures');
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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_area_branch_id_foreign');
            $table->dropForeign('companies_city_id_foreign');
            $table->dropForeign('companies_prefecture_id_foreign');
            $table->dropForeign('companies_trade_area_id_foreign');
            $table->dropForeign('companies_user_id_foreign');
        });
        Schema::dropIfExists('companies');
    }
};