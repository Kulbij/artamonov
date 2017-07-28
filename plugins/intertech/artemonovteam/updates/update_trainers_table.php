<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateTrainersTable extends Migration
{

    public function up()
    {
        Schema::table('intertech_artemonovteam_trainers', function(Blueprint $table)
        {
            $table->string('position')->nullable();
            $table->text('socials')->nullable();
        });
    }

    public function down()
    {
        Schema::table('intertech_artemonovteam_trainers', function(Blueprint $table)
        {
            $table->dropColumn([
                'position',
                'socials'
            ]);
        });
    }

}
