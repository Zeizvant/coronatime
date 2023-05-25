<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldwideStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function countryName()
	{
		return $this->hasOne(Country::class, 'code', 'code');
	}
}
