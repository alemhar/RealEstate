<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('address');
             $table->string('city');
             $table->string('archipelago');
             $table->string('officeno');
             $table->string('homeno');
             $table->string('mobileno1');
             $table->string('mobileno2');
             $table->string('skype');
             $table->string('whatsapp');
             $table->string('viber');
             $table->string('license');
             $table->string('company');
             $table->string('facebook');
             $table->string('website');
             $table->integer('proof')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
             $table->dropColumn('city');
             $table->dropColumn('archipelago');
             $table->dropColumn('officeno');
             $table->dropColumn('homeno');
             $table->dropColumn('mobileno1');
             $table->dropColumn('mobileno2');
             $table->dropColumn('skype');
             $table->dropColumn('whatsapp');
             $table->dropColumn('viber');
             $table->dropColumn('license');
             $table->dropColumn('company');
             $table->dropColumn('facebook');
             $table->dropColumn('website');
             $table->dropColumn('proof');
        });
    }
}
