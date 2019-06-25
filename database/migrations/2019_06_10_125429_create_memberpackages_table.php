<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberpackages', function (Blueprint $table) {
            $table->bigIncrements('memberpackagesid');
            $table->Integer('userid');
            $table->Integer('schemeid');
            $table->date('joindate')->nullable();
            $table->date('expiredate')->nullable();
            $table->string('extra1')->nullable();
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
        Schema::dropIfExists('memberpackages');
    }
}
