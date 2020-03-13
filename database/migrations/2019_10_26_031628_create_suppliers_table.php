<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');        
            $table->string('email');        
            $table->string('phone');        
            $table->string('address');        
            $table->string('type');        
            $table->string('shop');        
            $table->string('photo');        
            $table->string('accountholder');        
            $table->string('accountnumber');        
            $table->string('bankname');        
            $table->string('branchname');   
            $table->string('city');   
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
