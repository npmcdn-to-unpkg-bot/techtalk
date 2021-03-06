<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
	/**
	 * Fillable fields for an industry.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
		'position'
	];

	/**
	 * Get the orgs associated with the given industry.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function orgs()
    {
    	return $this->belongsToMany('App\Org', 'org_industry', 'industry_id', 'org_id')->withTimestamps();
    }

	/**
	 * Get the domains associated with the given industry.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function domains()
    {
    	return $this->hasMany('App\Domain');
    }
}
