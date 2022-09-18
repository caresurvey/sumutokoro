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
        Schema::create('company_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['company_id', 'user_id']);

            //外部キー制約
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
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
        Schema::table('company_user', function (Blueprint $table) {
            $table->dropForeign('company_user_company_id_foreign');
            $table->dropForeign('company_user_user_id_foreign');
        });

        Schema::dropIfExists('company_user');
    }
};
