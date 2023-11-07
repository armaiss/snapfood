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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('restaurant_category_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->string('name');
            $table->string('telephone');
            $table->string('bank_account_number');
            $table->decimal('cost_of_sending_order', 10, 2)->nullable()->default(null);
            $table->boolean('status')->default(1);

            // اضافه کردن فیلدهای ساعت باز و بسته شدن برای هر روز هفته
            $table->string('monday_opening');
            $table->string('monday_closing');
            $table->string('tuesday_opening');
            $table->string('tuesday_closing');
            $table->string('wednesday_opening');
            $table->string('wednesday_closing');
            $table->string('thursday_opening');
            $table->string('thursday_closing');
            $table->string('friday_opening');
            $table->string('friday_closing');
            $table->string('saturday_opening');
            $table->string('saturday_closing');
            $table->string('sunday_opening');
            $table->string('sunday_closing');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
