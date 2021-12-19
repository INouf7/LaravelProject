<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_table', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('team_id')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->integer('duration')->nullable();
            $table->double('cost')->nullable();
            $table->string('client');
            $table->enum("stage", ["Inception", "Milestone1", "Milestone2", " Final Report"])->default("Inception");
            $table->enum("status", ["On track", "Delayed", "Extended", "Completed"])->default("On track");
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
        Schema::dropIfExists('project_table');
    }
}
