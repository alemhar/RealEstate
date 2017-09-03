<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('rent');
            $table->boolean('sell');
            $table->boolean('assume');
            $table->boolean('lease');
            $table->boolean('pawn');
            $table->decimal('amount', 11, 2);
            $table->integer('floor'); 
            $table->decimal('landarea', 11, 2);
            $table->decimal('housearea', 11, 2);
            $table->integer('bedroom'); 
            $table->integer('bathroom'); 
            $table->integer('garage');
            $table->boolean('furnished');
            $table->boolean('laundry');
            $table->boolean('terrace');
            $table->boolean('fence');
            $table->integer('gate');
            $table->string('status', 20);
            $table->boolean('installment');
            $table->boolean('cash');
            $table->string('map');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropColumn('rent');
            $table->dropColumn('sell');
            $table->dropColumn('assume');
            $table->dropColumn('lease');
            $table->dropColumn('pawn');
            $table->dropColumn('amount');
            $table->dropColumn('floor'); 
            $table->dropColumn('landarea');
            $table->dropColumn('housearea');
            $table->dropColumn('bedroom'); 
            $table->dropColumn('bathroom'); 
            $table->dropColumn('garage');
            $table->dropColumn('furnished');
            $table->dropColumn('laundry');
            $table->dropColumn('terrace');
            $table->dropColumn('fence');
            $table->dropColumn('gate');
            $table->dropColumn('status');
            $table->dropColumn('installment');
            $table->dropColumn('cash');
            $table->dropColumn('map');
        });
    }
}
