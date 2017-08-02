<?php namespace Intertech\Artemonovteam\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateArticalTable extends Migration
{

    public function up()
    {
        Schema::table('intertech_artemonovteam_articals', function(Blueprint $table)
        {
            $table->timestamp('event')->nullable();
        });
    }

    public function down()
    {
        Schema::table('intertech_artemonovteam_articals', function(Blueprint $table)
        {
            $table->dropColumn([
                'event'
            ]);
        });
    }

}
