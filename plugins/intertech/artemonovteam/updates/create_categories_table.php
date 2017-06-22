<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_categories', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('short_text')->nullable();
            $table->text('description')->nullable();
            $table->text('video')->nullable();
            $table->string('slug')->index()->unique();
            $table->boolean('is_enabled')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_categories');
    }
}
