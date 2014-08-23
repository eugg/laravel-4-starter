<?php

use Illuminate\Database\Migrations\Migration;

class AddUserSoftDelete extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::table('users', function ($table) {
            $table->softDeletes();
        });
    }

    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {

        Schema::table('users', function ($table) {
            $table->dropSoftDeletes();
        });
    }

}
