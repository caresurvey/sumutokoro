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
        Schema::create('spot_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->string('kana', 255)->comment('名称ふりがな');
            $table->string('subname', 255)->comment('サブの名前');
            $table->string('email', 255)->comment('メールアドレス');
            $table->text('feature')->comment('特徴');
            $table->string('rooms', 255)->comment('部屋状況');
            $table->string('staff', 255)->comment('先方の担当者');
            $table->string('staffs', 255)->comment('スタッフ人数');
            $table->string('staff_age', 255)->comment('スタッフ平均年齢');
            $table->string('nurses', 255)->comment('看護師人数');
            $table->text('nurse_time')->comment('看護師滞在時間');
            $table->string('build_start', 255)->comment('建築年');
            $table->string('open_start', 255)->comment('開設年');
            $table->text('website')->comment('WEBサイト');
            $table->text('introducer')->comment('紹介者');
            $table->string('phone', 255)->comment('電話番号');
            $table->text('reserved_phone')->comment('予約用電話番号');
            $table->string('fax', 255)->comment('FAX番号');
            $table->text('comment')->comment('コメント');
            $table->text('comment2')->comment('コメント2');
            $table->string('company_name', 255)->comment('法人名');
            $table->string('company_staff', 255)->comment('法人スタッフ');
            $table->string('proarea', 255)->comment('エリア');
            $table->unsignedInteger('spot_id')->default(1)->comment('親ID');
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
        Schema::table('spot_details', function (Blueprint $table) {
            $table->dropForeign('spot_details_spot_id_foreign');
        });
        Schema::dropIfExists('spot_details');
    }
};
