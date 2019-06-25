<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->bigIncrements('schemesid');
            $table->Integer('rootschemeid');
            $table->string('schemename');
            $table->bigInteger('numberofdays');
            $table->string('baseprice');
            $table->Integer('tax');
            $table->Integer('male')->default(0);  
            $table->Integer('female')->default(0);     
            $table->bigInteger('actualprice');
            $table->timestamp('workinghourfrom')->nullable();
            $table->timestamp('workinghourto')->nullable();
            $table->date('validity');
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
        Schema::dropIfExists('schemes');
    }
}
