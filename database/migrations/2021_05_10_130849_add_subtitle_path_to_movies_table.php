<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubtitlePathToMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('subtitles')
                ->nullable()
                ->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->removeColumn('subtitles');
        });
    }
}
