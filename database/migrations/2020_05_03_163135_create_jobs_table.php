<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('location');
            $table->float('salary');
            $table->string('contract_type')->default('freelance');
            $table->bigInteger('agency_id')->nullable();
            $table->longText('job_description')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('education')->nullable();
            $table->longText('experiences')->nullable();
            $table->integer('experiences_number')->nullable();
            $table->date('postedDate');

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
        Schema::dropIfExists('jobs');
    }
}
