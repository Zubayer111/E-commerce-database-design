<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("sort_description");
            $table->string("price");
            $table->boolean("dicount");
            $table->string("dicount_price");
            $table->string("image");
            $table->boolean("stoke");
            $table->float("star");
            $table->enum("remark",["top","populer","trending"]);
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("category_id");

            $table->foreign("brand_id")->references("id")->on("brands")
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            $table->foreign("category_id")->references("id")->on("categories")
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
