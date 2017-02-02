<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('videos', function (Blueprint $table) {
			$table->increments('video_id');
			$table->string('title', 100);
			$table->string('description', 250);
			$table->string('link', 250);
			$table->integer('gallery_id')->unsigned();
			$table->foreign('gallery_id')->references('gallery_id')->on('galleries');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('videos');
	}
}
