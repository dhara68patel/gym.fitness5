<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('employeeid');
            $table->integer('roleid');
            $table->string('username',30);
            $table->string('role',30)->nullable();
            $table->string('email')->nullable();;
            $table->string('address')->nullable();;
            $table->string('city',50)->nullable();;
            $table->string('department')->nullable();;
            $table->biginteger('salary')->nullable();;
            $table->string('workinghourfrom1')->nullable();;
            $table->string('workinghourto1')->nullable();;
            $table->string('workinghourfrom2')->nullable();;
            $table->string('workinghourto2')->nullable();;
            $table->date('dob')->nullable();;
            $table->string('gender',10)->nullable();;
            $table->string('mobileno',20)->nullable();;
            $table->string('password')->nullable();;
            $table->string('photo')->nullable();;
            $table->string('accountno')->nullable();;
            $table->string('accountname')->nullable();;
            $table->string('ifsccode')->nullable();;
            $table->string('bankname')->nullable();;
            $table->string('branchname')->nullable();;
            $table->biginteger('branchcode')->nullable();;
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
        Schema::dropIfExists('employee');
    }
}
