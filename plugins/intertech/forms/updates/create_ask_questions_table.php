<?php namespace Intertech\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAskQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('intertech_forms_ask_questions', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name')->nullable();
            $table->string('massage')->nullable();
            $table->string('email')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intertech_forms_ask_questions');
    }
}
