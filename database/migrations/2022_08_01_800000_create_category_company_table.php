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
        Schema::create('category_company', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id', 10);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('company_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['category_id', 'company_id']);

            //外部キー制約
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
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
        Schema::table('category_company', function (Blueprint $table) {
            $table->dropForeign('category_company_category_id_foreign');
            $table->dropForeign('category_company_company_id_foreign');
        });

        Schema::dropIfExists('category_company');
    }
};
