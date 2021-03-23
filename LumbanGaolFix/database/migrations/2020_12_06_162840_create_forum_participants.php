<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('idForum');
            $table->unsignedBigInteger('idUser');
            $table->enum('status',['approved','rejected', 'waiting', 'blocked']);
            $table->timestamps();
            $table->primary(['idForum', 'idUser']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_participants');
    }
}
