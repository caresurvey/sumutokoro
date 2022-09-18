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
        Schema::create('logs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->text('log')->comment('ログ');
            $table->string('prefix', 255)->comment('操作したページタイプ[例：admin|general|user]');
            $table->string('page', 255)->comment('操作したページ[例：spot|company|user|fax]');
            $table->string('action', 255)->comment('行動種類[例：store|update|display|remove]');
            $table->unsignedInteger('column_id')->nullable()->comment('操作したモデルのid。');
            $table->string('value', 255)->comment('名前などの入力値や完了メッセージ');
            $table->string('ip', 255)->comment('操作したユーザーのIP');
            $table->string('user_name', 255)->comment('操作したユーザーの名前');
            $table->unsignedInteger('user_id')->comment('操作したユーザーのID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
