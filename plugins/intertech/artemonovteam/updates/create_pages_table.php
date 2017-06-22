<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_pages', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('cms_page')->index()->unique();
            $table->string('slug')->index()->unique();
            $table->boolean('is_header')->default(true);
            $table->boolean('is_footer')->default(false);
            $table->boolean('is_enabled')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_pages');
    }
}
