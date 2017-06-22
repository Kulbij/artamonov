<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_tags', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_enabled')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_tags');
    }
}
