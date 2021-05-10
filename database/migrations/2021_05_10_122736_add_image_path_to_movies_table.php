<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('poster')
                ->nullable()
                ->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->removeColumn('poster');
        });
    }
}
