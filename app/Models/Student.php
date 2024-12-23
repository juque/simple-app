<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

		protected $fillable = [
			'given_name',
			'middle_name',
			'surname',
			'date_of_birth',
			'gender',
			'enrolment_date'
		];
}
