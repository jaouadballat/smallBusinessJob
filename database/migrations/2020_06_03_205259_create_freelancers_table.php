<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('experiences_number')->nullable();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->longText('about')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('educations')->nullable();
            $table->longText('experiences')->nullable();
            $table->string('user_id');
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('freelancers');
    }
}
