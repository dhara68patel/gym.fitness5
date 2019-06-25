<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtpverifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otpverify', function (Blueprint $table) {
            $table->bigIncrements('otpverifyid');
            $table->string('mobileno',20);
            $table->string('email')->nullable();
            $table->Integer('code');
            $table->tinyInteger('isexpired')->default(0);
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
        Schema::dropIfExists('otpverify');
    }
}
