<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_section_title');
            $table->string('first_section_slogan');
            $table->text('first_section_description');
            $table->string('projects_title');
            $table->text('projects_description');
            $table->string('team_title');
            $table->text('team_description');
            $table->string('partners_title');
            $table->text('partners_description');
            $table->string('gallery_title');
            $table->text('gallery_description');
            $table->bigInteger('home_section_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['home_section_id', 'locale']);
            $table->foreign('home_section_id')->references('id')->on('home_sections')->onDelete('cascade');
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
        Schema::dropIfExists('home_section_translations');
    }
}
