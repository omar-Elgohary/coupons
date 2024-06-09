<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iso_codes', function (Blueprint $table) {
			$table->id();
			$table->string('iso2', 5);
			$table->string('iso3', 5);
			$table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iso_codes');
    }
};
