<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->enum('discount_type', ['percentage', 'fixed'])->nullable();
            $table->unsignedInteger('quantity');
            $table->boolean('active')->default(true);
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->nullOnDelete();
            $table->text('return_policy')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
