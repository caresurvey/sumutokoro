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
        Schema::create('spot_icon_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('name', 255)->comment('名前');
            $table->string('serial', 50)->unique()->comment('シリアル');
            $table->text('description', 255)->comment('概要');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('spot_icon_genre_id')->default(1)->comment('事業所アイコンジャンルID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['reorder', 'spot_icon_genre_id'], 'unique_reorder_spot_icon_genre');

            // 外部キーを追加
            $table->foreign('spot_icon_genre_id')
              ->references('id')
              ->on('spot_icon_genres');
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
        Schema::table('spot_icon_items', function (Blueprint $table) {
            $table->dropForeign('spot_icon_items_spot_icon_genre_id_foreign');
            $table->dropForeign('spot_icon_items_user_id_foreign');
        });
        Schema::dropIfExists('spot_icon_items');
    }
};
