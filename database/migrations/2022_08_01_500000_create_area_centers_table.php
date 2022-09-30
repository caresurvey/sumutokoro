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
        Schema::create('area_centers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('name', 255)->comment('名前');
            $table->string('label', 255)->comment('表示名');
            $table->string('book_label', 255)->comment('冊子での表示名');
            $table->string('zip1', 3)->comment('郵便番号1');
            $table->string('zip2', 4)->comment('郵便番号2');
            $table->string('address', 255)->comment('住所');
            $table->string('tel1', 5)->comment('電話番号1');
            $table->string('tel2', 5)->comment('電話番号2');
            $table->string('tel3', 5)->comment('電話番号3');
            $table->string('fax', 255)->comment('FAX番号');
            $table->string('email', 255)->comment('メールアドレス');
            $table->decimal('lat', 17,14)->comment('LAT');
            $table->decimal('lng', 17,14)->comment('LNG');
            $table->text('search_words')->comment('検索用テキスト（保存時に自動作成）');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('book_reorder')->default(1)->comment('冊子での並び順');
            $table->unsignedInteger('area_id')->default(1)->comment('エリアID');
            $table->unsignedInteger('area_section_id')->default(1)->comment('エリアセクションID');
            $table->unsignedInteger('city_id')->default(1)->comment('市町村ID');
            $table->unsignedInteger('prefecture_id')->default(1)->comment('都道府県ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['city_id', 'name']);

            // 外部キーを追加
            $table->foreign('area_id')
              ->references('id')
              ->on('areas'); // 元のテーブル
            $table->foreign('area_section_id')
              ->references('id')
              ->on('area_sections'); // 元のテーブル
            $table->foreign('city_id')
              ->references('id')
              ->on('cities'); // 元のテーブル
            $table->foreign('prefecture_id')
              ->references('id')
              ->on('prefectures'); // 元のテーブル
            $table->foreign('user_id')
              ->references('id')
              ->on('users'); // 元のテーブル
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('area_centers', function (Blueprint $table) {
            $table->dropForeign('area_centers_area_id_foreign');
            $table->dropForeign('area_centers_area_section_id_foreign');
            $table->dropForeign('area_centers_city_id_foreign');
            $table->dropForeign('area_centers_prefecture_id_foreign');
            $table->dropForeign('area_centers_user_id_foreign');
        });
        Schema::dropIfExists('area_centers');
    }
};