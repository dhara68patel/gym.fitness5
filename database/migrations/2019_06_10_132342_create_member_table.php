<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('memberid');   
            $table->Integer('userid')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();                       
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->date('createddate')->nullable();   
            $table->string('hearabout')->nullable();
            $table->string('other')->nullable();
            $table->string('formno')->nullable();
            $table->string('mobileno',20)->nullable();
            $table->string('homephonenumber')->nullable();           
            $table->string('officephonenumber')->nullable();
            $table->string('profession')->nullable();
            $table->date('birthday')->nullable();
            $table->date('anniversary')->nullable();
            $table->string('emergancyname')->nullable();
            $table->string('emergancyrelation')->nullable();
            $table->string('emergancyaddress')->nullable();
            $table->string('emergancyphonenumber')->nullable();
            $table->timestamp('workinghourfrom')->nullable();
            $table->timestamp('workinghourto')->nullable(); 
            $table->Integer('amount')->nullable();
            $table->Integer('companyid')->nullable();
            $table->string('photo')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('member');
    }
}
