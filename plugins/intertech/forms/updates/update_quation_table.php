<?php namespace Intertech\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateQuationsTable extends Migration
{

    public function up()
    {
        Schema::table('intertech_forms_ask_questions', function(Blueprint $table)
        {
            $table->dropColumn('full_name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('intertech_forms_ask_questions', function(Blueprint $table)
        {
            $table->dropColumn([
                'first_name',
                'last_name'
            ]);
        });
    }

}
