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
        Schema::create('area_branches', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->boolean('public')->default(0)->comment('一般画面で公開');
            $table->string('serial', 255)->comment('シリアル');
            $table->string('code', 5)->comment('都道府県コード');
            $table->string('name', 255)->comment('名前');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
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
        Schema::table('area_branches', function (Blueprint $table) {
            $table->dropForeign('area_branches_user_id_foreign');
        });
        Schema::dropIfExists('area_branches');
    }
};