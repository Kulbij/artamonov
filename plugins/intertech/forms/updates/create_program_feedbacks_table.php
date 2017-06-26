<?php namespace Intertech\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProgramFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_forms_program_feedbacks', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->text('message')->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->foreign('program_id')
                ->references('id')
                ->on('intertech_artemonovteam_programs')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_forms_program_feedbacks');
    }
}
