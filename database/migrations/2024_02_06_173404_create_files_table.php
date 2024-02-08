<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('files', function (Blueprint $table) {
			$table->increments('id');
			$table->string('file_name')->nullable();
			$table->string('subdir')->nullable();
			$table->string('file_size')->nullable();
			$table->string('content_type')->nullable();
			$table->string('original_main_color')->nullable();
			$table->string('exchange_main_color')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('files');
	}
};
