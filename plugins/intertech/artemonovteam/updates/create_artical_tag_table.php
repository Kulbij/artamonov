<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticalTagTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_artical_tag', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('artical_id')->unsigned()->nullable();
            $table->foreign('artical_id')
                ->references('id')
                ->on('intertech_artemonovteam_articals')
                ->onDelete('set null');
            $table->integer('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')
                ->references('id')
                ->on('intertech_artemonovteam_tags')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_artical_tag');
    }
}
