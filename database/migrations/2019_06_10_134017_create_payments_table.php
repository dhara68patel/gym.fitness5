<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('paymentsid');
            $table->Integer('memberid')->nullable();
            $table->Integer('userid')->nullable();
            $table->bigInteger('actualamount')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->Integer('tax')->nullable();
            $table->bigInteger('taxamount')->nullable();
            $table->Integer('discount')->nullable();
            $table->bigInteger('discountamount')->nullable();
            $table->Integer('discount2')->nullable();
            $table->bigInteger('discount2amount')->nullable();
            $table->date('date')->nullable();
            $table->date('duedate')->nullable();
            $table->date('paymentdate')->nullable();
            $table->Integer('schemeid')->nullable();
            $table->bigInteger('remainingamount')->nullable(); 
            $table->string('mode')->nullable(); 
            $table->Integer('otherchargesdetailsid')->nullable();
            $table->Integer('expenseid')->nullable();
            $table->Integer('expensedetailsid')->nullable();
            $table->Integer('employeeid')->nullable();
            $table->Integer('voucherid')->nullable();
            $table->Integer('billid')->nullable();
            $table->Integer('storebillid')->nullable();
            $table->bigInteger('receiptno')->nullable();
            $table->Integer('employeesalaryid')->nullable();
            $table->string('type')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
