<?php namespace Intertech\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateProgramFeedbackTable extends Migration
{

    public function up()
    {
        Schema::table('intertech_forms_program_feedbacks', function(Blueprint $table)
        {
            $table->dropColumn('full_name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('intertech_forms_program_feedbacks', function(Blueprint $table)
        {
            $table->dropColumn([
                'first_name',
                'last_name'
            ]);
        });
    }

}
