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
        Schema::create('spot_icon_genres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->boolean('display')->default(0)->comment('表示');
            $table->string('serial', 255)->unique()->comment('シリアル');
            $table->string('name', 255)->comment('名前');
            $table->text('description', 255)->comment('このジャンルについての概要');
            $table->unsignedInteger('reorder')->default(1)->comment('並び順');
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
        Schema::dropIfExists('spot_icon_genres');
    }
};
