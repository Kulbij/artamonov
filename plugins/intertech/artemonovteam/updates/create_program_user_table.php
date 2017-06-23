<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProgramUserTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_program_user', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('program_id')->unsigned()->nullable();
            $table->foreign('program_id')
                ->references('id')
                ->on('intertech_artemonovteam_programs')
                ->onDelete('set null');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_program_user');
    }
}
