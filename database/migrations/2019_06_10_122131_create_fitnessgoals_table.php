<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessgoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitnessgoals', function (Blueprint $table) {
            $table->bigIncrements('fitnessgoalsid');
            $table->integer('memberid')->nullable();
                $table->integer('losebodyfat')->nullable();
                $table->integer('developmuscle')->nullable();
                $table->integer('rehabilitateaninjury')->nullable();
                $table->integer('improvebalance')->nullable();
                $table->integer('improveflexibility')->nullable();
                $table->integer('nutritionaleducation')->nullable();
                $table->integer('designbeginnersprogram')->nullable();
                $table->integer('desigadvancedprogram')->nullable();
                $table->integer('trainspecific')->nullable();
                $table->integer('safety')->nullable();
                $table->integer('makeexercisefun')->nullable();
                $table->integer('motivation')->nullable();
                $table->integer('other')->nullable();
                $table->integer('otherhelp')->nullable();
                $table->integer('anniversary')->nullable();
                $table->integer('specificgoalsa')->nullable();
                $table->integer('specificgoalsb')->nullable();
                $table->integer('specificgoalsc')->nullable();
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
        Schema::dropIfExists('fitnessgoals');
    }
}
