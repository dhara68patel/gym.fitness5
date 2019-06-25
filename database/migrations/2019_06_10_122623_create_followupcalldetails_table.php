<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowupcalldetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followupcalldetails', function (Blueprint $table) {
            $table->bigIncrements('followupcalldetailsid');
            $table->integer('inquiriesid');
            $table->string('callcompletedby');
            $table->string('callresponse');
            $table->date('calldate');
            $table->string('callduration',30);
            $table->string('callnotes')->nullable();
            $table->string('callrating',20);
            $table->integer('schemeid');
            $table->date('schedulenextcalldate')->nullable();
            $table->string('scheduleassign')->nullable();
            $table->string('trainer')->nullable();
            $table->date('freetrial')->nullable();
            $table->string('freetrialpackage')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followupcalldetails');
    }
}
