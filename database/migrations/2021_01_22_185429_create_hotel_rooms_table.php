<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelRoomsTable extends Migration {

	public function up()
	{
		Schema::create('hotel_rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('hotel_id')->unsigned();
			$table->string('client_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('hotel_rooms');
	}
}