<?php namespace RainLab\User\Updates;

use October\Rain\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['name', 'surname']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->string('phone');
            $table->string('vatin')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->integer('flat')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'patronymic',
                'phone',
                'vatin',
                'city',
                'street',
                'house',
                'flat',
            ]);

            $table->string('name')->nullable();
            $table->string('surname')->nullable();
        });
    }
}
