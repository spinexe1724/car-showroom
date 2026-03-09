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
       Schema::create('cars', function (Blueprint $table) {
    $table->id();
    $table->string('vin')->unique(); // Kunci unik untuk sync
$table->unsignedBigInteger('showroom_id')->index();
    $table->string('brand');
    $table->string('model');
    $table->integer('price');
    $table->string('image_path')->nullable(); // Foto akan diupdate manual nanti
    $table->boolean('is_active')->default(true); // Untuk hapus otomatis yang tidak ada di excel
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
