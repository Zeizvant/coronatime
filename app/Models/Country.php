<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = ['id'];

	public function country()
	{
		return $this->belongsTo(WorldwideStatistic::class, 'code', 'code');
	}
}
