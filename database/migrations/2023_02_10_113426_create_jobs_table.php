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
            $table->id();
            $table->foreignId('owner_id')
                ->constrained('owners')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('prefectures_id');
            $table->integer('status');
            $table->integer('wage_type');
            $table->integer('salary_amount');
            $table->string('img_name')->nullable();
            $table->string('img_path')->nullable();
            $table->integer('age');
            $table->integer('license');
            $table->integer('experience');
            $table->string('company_name');
            $table->string('company_tel');
            $table->string('company_email');
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
