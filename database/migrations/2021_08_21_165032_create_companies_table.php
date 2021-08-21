<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            /* DADOS DA EMPRESA
            ================================================== */
            $table->uuid( 'uuid' )->unique(); ## UUID

            $table->foreignId( 'category_id' )->constrained( 'categories' ); ## CATEGORIA

            $table->string( 'name' )->unique(); ## NOME
            $table->string( 'url' )->unique(); ## URL

            $table->string( 'phone' )->unique()->nullable(); ## TELEFONE
            $table->string( 'whatsapp' )->unique(); ## WHATSAPP
            $table->string( 'email' )->unique(); ## E-MAIL

            $table->string( 'facebook' )->unique()->nullable(); ## FACEBOOK
            $table->string( 'instagram' )->unique()->nullable(); ## INSTAGRAM
            $table->string( 'youtube' )->unique()->nullable(); ## YOUTUBE

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
