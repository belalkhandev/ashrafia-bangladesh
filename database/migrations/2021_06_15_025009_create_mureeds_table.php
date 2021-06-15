<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMureedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mureeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('head_of_family')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('blood_group')->nullable();
            $table->string('place')->nullable();
            $table->string('nid')->unique();
            $table->string('nationality')->nullable();
            $table->string('prefession')->nullable();
            $table->string('home_address')->nullable();
            $table->string('telephone_home')->nullable();
            $table->string('mobile')->nullable();
            $table->string('office_address')->nullable();
            $table->string('telephone_office')->nullable();
            $table->string('fax')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_telephone')->nullable();
            $table->string('disciple_of')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('remarks')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mureeds');
    }
}
