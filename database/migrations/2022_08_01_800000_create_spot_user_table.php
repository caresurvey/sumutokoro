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
        Schema::create('spot_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->unsignedInteger('spot_id');
            $table->unsignedInteger('user_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['spot_id', 'user_id']);

            //外部キー制約
            $table->foreign('spot_id')
                ->references('id')
                ->on('spots')
                ->cascadeOnDelete();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('spot_user', function (Blueprint $table) {
            $table->dropForeign('spot_user_spot_id_foreign');
            $table->dropForeign('spot_user_user_id_foreign');
        });

        Schema::dropIfExists('spot_user');
    }
};
