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
        Schema::create('contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->string('name', 255)->comment('名前');
            $table->string('kana', 255)->comment('ふりがな');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('tel', 255)->comment('電話番号');
            $table->string('reply', 255)->comment('ご返答方法');
            $table->text('msg')->comment('お問い合わせ内容');
            $table->string('ip', 20)->comment('IPアドレス');
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
        Schema::dropIfExists('contacts');
    }
};