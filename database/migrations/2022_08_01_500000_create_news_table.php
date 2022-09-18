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
        Schema::create('news', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->boolean('preview')->default(0)->comment('プレビュー');
            $table->string('name', 255)->comment('記事名');
            $table->text('body')->comment('本文');
            $table->text('more')->comment('追記');
            $table->string('url', 255)->comment('関連URL');
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
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('news_user_id_foreign');
        });
        Schema::dropIfExists('news');
    }
};
