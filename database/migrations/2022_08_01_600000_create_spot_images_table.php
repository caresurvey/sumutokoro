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
        Schema::create('spot_images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('name', 255)->unique()->comment('ファイル名');
            $table->string('tag', 50)->comment('タグ');
            $table->text('msg')->comment('キャプション');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('spot_id')->default(1)->comment('親ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
            $table->foreign('spot_id')
              ->references('id')
              ->on('spots')
              ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spot_images', function (Blueprint $table) {
            $table->dropForeign('spot_images_spot_id_foreign');
        });
        Schema::dropIfExists('spot_images');
    }
};
