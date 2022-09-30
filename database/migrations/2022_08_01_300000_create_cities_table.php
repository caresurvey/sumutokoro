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
        Schema::create('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->boolean('public')->default(0)->comment('一般画面で公開');
            $table->string('name', 255)->comment('名前');
            $table->string('label', 255)->comment('表示名');
            $table->string('code', 5)->comment('市町村コード');
            $table->string('serial', 255)->comment('シリアル');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('book_reorder')->default(1)->comment('冊子での並び順');
            $table->unsignedInteger('area_branch_id')->default(1)->comment('振興局ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
            $table->foreign('area_branch_id')
              ->references('id')
              ->on('area_branches'); // 元のテーブル
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
        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign('cities_area_branch_id_foreign');
            $table->dropForeign('cities_user_id_foreign');
        });
        Schema::dropIfExists('cities');
    }
};