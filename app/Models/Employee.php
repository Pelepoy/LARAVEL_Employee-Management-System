<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use HasFactory, SoftDeletes;

	public $primaryKey = 'employee_id';
	public $incrementing = false;
	public $keyType = 'string';

	protected $guarded = [];
	protected $fillable = ['employee_id', 'firstname', 'middlename', 'lastname', 'suffix'];

	public const SUFFIX = ['Jr', 'Sr', 'II', 'III', 'IV', 'V'];


	protected static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			// Get the latest employee ID from the database, including soft-deleted records
			$latestEmployee = Employee::withTrashed()->latest('employee_id')->first();

			if ($latestEmployee) {
				// Extract the numeric part of the employee ID and increment it	
				$numericPart = (int) substr($latestEmployee->employee_id, 3);
				$nextId = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
			} else {
				// If no employees exist, start with 001
				$nextId = '001';
			}

			$model->employee_id = 'KOY' . $nextId;
		});
	}
}
