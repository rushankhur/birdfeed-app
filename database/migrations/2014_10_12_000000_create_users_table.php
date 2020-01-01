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
        //$connection = 'mysql';
        $connection = 'sqlite';

        //Schema::connection($connection)->create('users', function (Blueprint $table) {
        Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('created_by')->nullable();
                $table->unsignedInteger('last_modified_by')->nullable();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
                $table->unsignedInteger('deleted_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users');
                $table->foreign('last_modified_by')->references('id')->on('users');
                $table->foreign('deleted_by')->references('id')->on('users');

            });
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
