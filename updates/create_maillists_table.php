<?php namespace GrofGraf\LocalMaillist\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMaillistsTable extends Migration
{
    public function up()
    {
        Schema::create('grofgraf_localmaillist_maillists', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('maillist')->nullable();
            $table->boolean('subscribed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grofgraf_localmaillist_maillists');
    }
}
