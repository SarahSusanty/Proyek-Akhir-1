<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumPicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_picture', function (Blueprint $table) {
            $table->unsignedBigInteger('idAlbum');
            $table->unsignedBigInteger('idPicture');
            $table->timestamps();
            $table->primary(['idAlbum', 'idPicture']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_picture');
    }
}
