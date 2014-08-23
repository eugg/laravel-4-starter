<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfo extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('username', 128)->nullable();
            $table->smallInteger('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->text('bio', 65535)->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->string('address', 255)->nullable();
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
        Schema::drop('user_info');
    }

}
