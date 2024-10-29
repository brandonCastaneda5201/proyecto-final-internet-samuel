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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("titulo")->unique()->max(255);
            $table->string("autor")->max(255);
            $table->string("editorial")->max(255);
            $table->string("edicion")->max(255);
            $table->string("sinopsis")->max(255);
            $table->integer("stock")->min(1)->default(1);
            $table->string("fecha_publicacion");
            $table->integer("paginas")->min(1)->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
