<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('news', function (Blueprint $table) {
			$table->increments('new_id');
			$table->string('title', 100);
			$table->string('pompadour', 250);
			$table->text('body');
			$table->string('photo', 250);
			$table->integer('typenew_id')->unsigned();
			$table->foreign('typenew_id')->references('typenew_id')->on('type_news');
			$table->boolean('great');
			$table->dateTime('publication_date');
			$table->dateTime('end_publication');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('news');
	}
}
