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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('nomEtab')->unique();
            $table->string('emailEtab')->unique();
            // ca
            $table->string('typeEtab'); 
            //ca    
            $table->string('statusEtab');                         
            $table->string('adresseEtab')->nullable();
            // ca
            $table->integer('dateCreation');
            // ca
            $table->string('codeIA');
           
            $table->string('matriculeEtab')->nullable()->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
