<?php namespace Intertech\Seo\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeoTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_seo_seo', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url_mask')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('canonical')->nullable();
            $table->text('additional_tags')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_seo_seo');
    }
}
