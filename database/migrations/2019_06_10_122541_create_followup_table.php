<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followup', function (Blueprint $table) {
            $table->bigIncrements('followupid');
            $table->string('inquiryid')->nullable();
            $table->string('userid')->nullable();
            $table->string('followuptime')->nullable();
            $table->string('remarks')->nullable();
            $table->string('followupdays')->nullable();
            $table->string('followuptakendate')->nullable(); 
            $table->string('reason')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('followup');
    }
}
