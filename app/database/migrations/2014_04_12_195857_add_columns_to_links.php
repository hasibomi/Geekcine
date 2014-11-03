<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnsToLinks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('links', function($table)
		{
    		$table->string('quality', 255)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('links', function($table)
		{
			$table->dropColumn('quality');
		});
	}

}