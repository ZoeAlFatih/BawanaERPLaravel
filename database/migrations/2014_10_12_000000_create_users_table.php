<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nip',6)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pob',25);
            $table->date('dob');
            $table->enum('religion',['islam', 'katolik', 'protestan', 'hindu', 'budha']);
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['single', 'relationship', 'married', 'divorce']);
            $table->integer('number_of_children');
            $table->text('address');
            $table->string('phone_number',25);
            $table->string('last_education');
            $table->date('appointment_date');
            $table->string('id_no',25);
            $table->string('tax_no',25);
            $table->string('position',25);
            $table->integer('salary');
            $table->enum('employment_status', ['permanent', 'trial', 'apprentice']);
            $table->string('foto');
            $table->enum('active', ['1', '0']);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
