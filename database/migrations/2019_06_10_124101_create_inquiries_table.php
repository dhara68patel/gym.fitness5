<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->bigIncrements('inquiriesid');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender',10);
            $table->string('email');
            $table->string('mobileno',20);
            $table->date('createddate');
            $table->string('profession',50);
            $table->string('alreadymember',5);
            $table->string('remarks')->nullable();
            $table->string('hearabout');
            $table->string('packagename');
            $table->string('poc',30);
            $table->string('note')->nullable();
            $table->string('inquirytype');
            $table->string('other')->nullable();
            $table->smallInteger('reason')->nullable();
            $table->string('reasondescription')->nullable();
            $table->string('promotionalemail')->nullable();
            $table->string('promotionalsms')->nullable();
            $table->string('transactionalsms')->nullable();
            $table->string('transactionalemail')->nullable();
            $table->string('rating',30)->nullable();
            $table->string('referenceby');
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
        Schema::dropIfExists('inquiries');
    }
}
