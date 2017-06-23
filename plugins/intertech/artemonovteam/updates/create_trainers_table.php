<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTrainersTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_trainers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name');
            $table->text('description');
            $table->boolean('is_enabled')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_trainers');
    }
}
