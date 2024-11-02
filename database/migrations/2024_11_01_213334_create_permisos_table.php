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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            // Permisos para libros
            $table->boolean("show-libro")->default(true);
            $table->boolean("create-libro")->default(false);
            $table->boolean("edit-libro")->default(false); 
            $table->boolean("delete-libro")->default(false); 

            // Permisos para etiquetas
            $table->boolean("show-etiqueta")->default(true);
            $table->boolean("create-etiqueta")->default(false); 
            $table->boolean("edit-etiqueta")->default(false);   
            $table->boolean("delete-etiqueta")->default(false);  

            // Permisos para compras
            $table->boolean("show-compra")->default(false);
            $table->boolean("create-compra")->default(false);
            $table->boolean("edit-compra")->default(false);
            $table->boolean("delete-compra")->default(false);

            // Permisos para clientes
            $table->boolean("show-cliente")->default(false);
            $table->boolean("create-cliente")->default(false);
            $table->boolean("edit-cliente")->default(false);
            $table->boolean("delete-cliente")->default(false);

            // Permisos para gestionar permisos
            $table->boolean("show-permiso")->default(false);
            $table->boolean("edit-permiso")->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Permiso para compras de libros
            $table->boolean("compra-libro")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
