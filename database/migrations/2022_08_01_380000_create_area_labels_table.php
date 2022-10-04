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
        Schema::create('area_labels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('name', 255)->comment('名前');
            $table->string('label', 255)->comment('表示名');
            $table->string('book_label', 255)->comment('冊子での表示名');
            $table->string('serial', 255)->unique()->comment('シリアル名');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('book_reorder')->default(1)->comment('冊子での並び順');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
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
        Schema::table('area_labels', function (Blueprint $table) {
            $table->dropForeign('area_labels_user_id_foreign');
        });
        Schema::dropIfExists('area_labels');
    }
};