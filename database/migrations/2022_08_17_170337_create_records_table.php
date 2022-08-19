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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kind');
            $table->integer('artist_id');
            $table->string('title');
            $table->integer('label_id');
            $table->integer('country_id')->nullable();
            $table->string('platform_id')->nullable();
            $table->string('catalog_number')->nullable();
            $table->string('matrix_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('release_date')->nullable();
            $table->string('reissue_date')->nullable();
            $table->integer('grading_media')->nullable();
            $table->integer('grading_cover')->nullable();
            $table->string('current_price')->nullable();
            $table->string('buy_price')->nullable();
            $table->string('archive_number')->nullable();
            $table->boolean('for_sale')->default(FALSE);
            $table->boolean('sold')->default(FALSE);
            $table->string('sold_to')->nullable();
            $table->string('sold_date')->nullable();
            $table->string('sold_price')->nullable();
            $table->boolean('lost')->default(FALSE);
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
