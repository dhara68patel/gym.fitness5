<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotoficationmsgdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notoficationmsgdetails', function (Blueprint $table) {
            $table->bigIncrements('notoficationmsgdetailsid');
            $table->string('mobileno',20)->nullable();
            $table->string('smsmsg')->nullable();
            $table->string('mailmsg')->nullable();
            $table->string('callnotes')->nullable();
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
        Schema::dropIfExists('notoficationmsgdetails');
    }
}
