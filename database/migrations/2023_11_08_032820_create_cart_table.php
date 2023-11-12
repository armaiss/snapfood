<?php

use App\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
//            $table->string('id')->default(Str::random(8));
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_paid')->default(0);
            $table->string('total_price');
//          $table->enum('status', StatusType::getStatus())->default(StatusType::PENDING);
            $table->string('status')->default('pending');
            $table->timestamps();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('food_id')- >references('id')->on('foods')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
