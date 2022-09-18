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
        Schema::create('authenticates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->date('auth_date')->comment('認証日');
            $table->boolean('is_enabled')->default(0)->comment('有効');
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
        Schema::table('authenticates', function (Blueprint $table) {
            $table->dropForeign('authenticates_user_id_foreign');
        });
        Schema::dropIfExists('authenticates');
    }
};