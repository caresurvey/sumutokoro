<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('enabled')->default(0)->comment('有効かどうか');
            $table->string('name', 255)->comment('名前');
            $table->string('kana', 255)->comment('かな');
            $table->string('zip1', 3)->comment('郵便番号1');
            $table->string('zip2', 4)->comment('郵便番号2');
            $table->string('address', 255)->comment('住所');
            $table->string('tel1', 5)->comment('電話番号1');
            $table->string('tel2', 5)->comment('電話番号2');
            $table->string('tel3', 5)->comment('電話番号3');
            $table->string('fax', 255)->comment('FAX');
            $table->string('email', 255)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->boolean('is_authenticated')->default(0)->comment('認証済みかどうか');
            $table->text('authenticated_msg')->comment('認証済みに関してのメモ');
            $table->string('authenticated_date')->nullable()->comment('認証した日');
            $table->text('company')->comment('所属している事業所や法人');
            $table->decimal('lat', 17,14)->comment('LAT');
            $table->decimal('lng', 17,14)->comment('LNG');
            $table->text('msg')->comment('備考');
            $table->unsignedInteger('reorder')->default(99)->comment('並び順');
            $table->unsignedInteger('prefecture_id')->default(1)->comment('都道府県ID');
            $table->unsignedInteger('city_id')->default(1)->comment('市町村ID');
            $table->unsignedInteger('job_type_id')->default(1)->comment('職種ID');
            $table->unsignedInteger('role_id')->default(4)->comment('権限');
            $table->unsignedInteger('trade_area_id')->default(1)->comment('商圏ID');
            $table->unsignedInteger('user_type_id')->default(1)->comment('ユーザータイプID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->rememberToken();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

            // 外部キーを追加
            $table->foreign('role_id')
              ->references('id')
              ->on('roles');
            $table->foreign('job_type_id')
              ->references('id')
              ->on('job_types');
            $table->foreign('user_type_id')
              ->references('id')
              ->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_job_type_id_foreign');
            $table->dropForeign('users_user_type_id_foreign');
        });
        Schema::dropIfExists('users');
    }
};
