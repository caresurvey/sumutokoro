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
        Schema::create('spot_prices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->string('name', 255)->comment('内容');
            $table->string('description', 255)->comment('説明');
            $table->string('ps', 255)->comment('追記：例や注意事項など');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
            $table->unsignedInteger('price_genre_id')->default(1)->comment('料金種類ID');
            $table->unsignedInteger('spot_id')->default(1)->comment('親ID');
            $table->unsignedInteger('user_id')->default(1)->comment('ユーザーID');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['price_genre_id', 'spot_id'], 'unique_price_genre_id_spot_id');

            // 外部キーを追加
            $table->foreign('price_genre_id')
              ->references('id')
              ->on('price_genres')
              ->cascadeOnDelete();
            $table->foreign('spot_id')
              ->references('id')
              ->on('spots')
              ->cascadeOnDelete();
            $table->foreign('user_id')
              ->references('id')
              ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spot_prices', function (Blueprint $table) {
            $table->dropForeign('spot_prices_price_genre_id_foreign');
            $table->dropForeign('spot_prices_spot_id_foreign');
        });
        Schema::dropIfExists('spot_prices');
    }
};
