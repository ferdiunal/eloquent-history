<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_histories', function (Blueprint $table) {
            switch(config('history.table_id_type')) {
                case 'bigIncrements': 
                    $table->id();
                    $table->morphs('model');
                    $table->morphs('user');
                    break;
                case 'uuid':
                    $table->uuid('id')->primary();
                    $table->uuidMorphs('model');
                    $table->uuidMorphs('user');
                    break;
                case 'ulid':
                    $table->ulid('id')->primary();
                    $table->ulidMorphs('model');
                    $table->ulidMorphs('user');
                    break;
            }
            $table->string('message');
            $table->text('meta')->nullable();
            $table->timestampTz('performed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_histories');
    }
}
