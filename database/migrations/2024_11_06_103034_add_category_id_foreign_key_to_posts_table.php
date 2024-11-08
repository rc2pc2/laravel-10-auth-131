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
        Schema::table('posts', function (Blueprint $table) {
            // # creo la colonna category_id di tipo Unsigned Big Integer e la posiziono dopo l'id
            $table->unsignedBigInteger("category_id")->after("id")->nullable(true);

            // % crea un nuovo vincolo di chiave esterna (foreign key)
            // % sulla mia colonna category_id
            // % che faccia riferimento alla colonna id della tabella ESTERNA categories
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnUpdate()->nullOnDelete();

            // $table->foreignId("category_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign("posts_category_id_foreign"); // potete cercarla tra gli indici della tabella
            $table->dropColumn("category_id");
        });
    }
};
