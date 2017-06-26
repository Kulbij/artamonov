<?php namespace Intertech\Subscribe\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_subscribe_subscribers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('secret_key')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_subscribe_subscribers');
    }
}
