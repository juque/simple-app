<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a student', function () {
  $student = Student::factory()->create();

  expect($student)->toBeInstanceOf(Student::class)
                  ->and($student->id)->not->toBeNull()
                  ->and($student->given_name)->not->toBeNull();
});


it('can update a student', function () {
    $student = Student::factory()->create();

    $student->update([
        'given_name' => 'Updated Name',
    ]);

    expect($student->fresh()->given_name)->toBe('Updated Name');
});

it('can delete a student', function () {
    $student = Student::factory()->create();

    $student->delete();

    expect(Student::find($student->id))->toBeNull();
});

it('validates the student attributes', function () {
    $student = Student::factory()->make();

    expect($student->given_name)->toBeString()
        ->and($student->surname)->toBeString()
        ->and($student->date_of_birth)->toBeString()
        ->and($student->gender)->toBeIn(['male', 'female', 'other'])
        ->and($student->enrolment_date)->toBeString();
});
