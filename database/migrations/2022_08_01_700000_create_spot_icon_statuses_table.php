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
        Schema::create('spot_icon_statuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->unsignedInteger('spot_icon_item_id')->default(1)->comment('事業所アイコン項目ID');
            $table->unsignedInteger('spot_icon_type_id')->default(1)->comment('事業所アイコンタイプID');
            $table->unsignedInteger('spot_icon_genre_id')->default(1)->comment('事業所アイコンジャンルID');
            $table->unsignedInteger('spot_id')->default(1)->comment('親ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['spot_id', 'spot_icon_item_id', 'spot_icon_type_id'], 'unique_spot_icon_status');

            // 外部キーを追加
            $table->foreign('spot_id')
              ->references('id')
              ->on('spots')
              ->cascadeOnDelete();
            $table->foreign('spot_icon_item_id')
              ->references('id')
              ->on('spot_icon_items');
            $table->foreign('spot_icon_type_id')
              ->references('id')
              ->on('spot_icon_types');
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
        Schema::table('spot_icon_statuses', function (Blueprint $table) {
            $table->dropForeign('spot_icon_statuses_spot_id_foreign');
            $table->dropForeign('spot_icon_statuses_spot_icon_item_id_foreign');
            $table->dropForeign('spot_icon_statuses_spot_icon_type_id_foreign');
            $table->dropForeign('spot_icon_statuses_spot_icon_genre_id_foreign');
            $table->dropForeign('spot_icon_statuses_user_id_foreign');
        });
        Schema::dropIfExists('spot_icon_statuses');
    }
};
