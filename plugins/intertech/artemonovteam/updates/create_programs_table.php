<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_artemonovteam_programs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('short_text')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->index()->unique();
            $table->boolean('is_enabled')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('intertech_artemonovteam_categories')
                ->onDelete('set null');
                
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_artemonovteam_programs');
    }
}
