<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_video', function (Blueprint $table) {
            $table->unsignedBigInteger('idAlbum');
            $table->unsignedBigInteger('idVideo');
            $table->timestamps();
            $table->primary(['idAlbum', 'idVideo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_video');
    }
}
