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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string("title",45);
            $table->text("biografia");
            $table->string("website",45);

            //sin signo, grande, y entero(propiedades de id)
            $table->unsignedBigInteger("user_id")->unique();

            //llave foranea es una restriccion usar solo valores existentes de users id
            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onUpdate("cascade")
            ->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
