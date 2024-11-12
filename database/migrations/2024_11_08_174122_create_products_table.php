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
            $table->string('ci', 50);
            $table->string('name_client', 50);
            $table->string('lastname_client', 50);
            $table->string('email_client', 50);
            $table->string('brand', 50);
            $table->string('name', 50);
            $table->string('solution', 50)->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
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
