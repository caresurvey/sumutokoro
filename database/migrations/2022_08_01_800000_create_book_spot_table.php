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
        Schema::create('book_spot', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('spot_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['book_id', 'spot_id']);

            //外部キー制約
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->cascadeOnDelete();
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
        Schema::table('book_spot', function (Blueprint $table) {
            $table->dropForeign('book_spot_book_id_foreign');
            $table->dropForeign('book_spot_spot_id_foreign');
        });

        Schema::dropIfExists('book_spot');
    }
};
