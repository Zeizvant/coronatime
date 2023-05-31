<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorldwideStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function countryName(): HasOne
	{
		return $this->hasOne(Country::class, 'code', 'code');
	}
}
