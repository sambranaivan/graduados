<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('logs', function (Blueprint $table) {
			$table->increments('log_id');
			$table->integer('typelog_id')->unsigned();
			$table->foreign('typelog_id')->references('typelog_id')->on('type_logs');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('user_id')->on('users');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('category_id')->on('categories');
			$table->string('message', 500);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('logs');
	}
}
