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
        Schema::create('areas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('name', 255)->comment('名前');
            $table->string('label', 255)->comment('表示名');
            $table->string('book_label', 255)->comment('冊子での表示名');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('book_reorder')->default(1)->comment('冊子での並び順');
            $table->unsignedInteger('area_section_id')->default(1)->comment('エリアセクションID');
            $table->unsignedInteger('city_id')->default(1)->comment('市町村ID');
            $table->unsignedInteger('prefecture_id')->default(1)->comment('都道府県ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['city_id', 'name']);

            // 外部キーを追加
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
        Schema::table('areas', function (Blueprint $table) {
            $table->dropForeign('areas_area_section_id_foreign');
            $table->dropForeign('areas_city_id_foreign');
            $table->dropForeign('areas_prefecture_id_foreign');
            $table->dropForeign('areas_user_id_foreign');
        });
        Schema::dropIfExists('areas');
    }
};