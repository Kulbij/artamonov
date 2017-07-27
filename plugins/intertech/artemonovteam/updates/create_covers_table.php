<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCoversTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_covers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_botton')->default(true);
            $table->boolean('is_main')->default(false);
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_covers');
    }
}
