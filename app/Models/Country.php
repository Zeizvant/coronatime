<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = ['id'];

	public function country(): BelongsTo
	{
		return $this->belongsTo(WorldwideStatistic::class, 'code', 'code');
	}
}
