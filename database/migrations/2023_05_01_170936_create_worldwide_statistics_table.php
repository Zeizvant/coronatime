<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('worldwide_statistics', function (Blueprint $table) {
			$table->id();
			$table->string('country');
			$table->string('code');
			$table->unsignedInteger('confirmed');
			$table->unsignedInteger('recovered');
			$table->unsignedInteger('critical');
			$table->unsignedInteger('deaths');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('country_statistics');
	}
};
