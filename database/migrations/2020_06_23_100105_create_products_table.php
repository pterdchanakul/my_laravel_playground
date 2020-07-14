<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('atelectasis');
            $table->string('cardiomegaly');
            $table->string('effusion');
            $table->string('infiltration');
            $table->string('mass');
            $table->string('nodule');
            $table->string('pneumonia');
            $table->string('pneumothorax');
            $table->string('consolidation');
            $table->string('edema');
            $table->string('emphysema');
            $table->string('fibrosis');
            $table->string('pleural_thickening');
            $table->string('hernia');
            $table->string('no_finding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
