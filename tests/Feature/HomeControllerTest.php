<?php

use App\Models\Student;
use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns all students when no search query is provided', function () {
    // Create test data
    Student::factory()->count(15)->create();

    // Perform a GET request without a search query
    $response = get(route('home.index'));

    // Assert that all students are present in the paginated results
    $response->assertStatus(200)
             ->assertViewIs('home')
             ->assertViewHas('students', function ($students) {
                 return $students->total() === 15;
             });
});

it('returns only matching students for a search query', function () {
    // Create specific students to test the search
    Student::factory()->create(['given_name' => 'John']);
    Student::factory()->create(['surname' => 'Doe']);
    Student::factory()->count(5)->create(); // Additional non-matching students

    // Perform a GET request with a search query
    $response = get(route('home.index', ['search' => 'John']));

    // Assert that the response contains only the matching students
    $response->assertStatus(200)
             ->assertViewIs('home')
             ->assertViewHas('students', function ($students) {
                 return $students->count() === 1 && $students->first()->given_name === 'John';
             });
});

it('is case-insensitive when searching students', function () {
    // Create a student with mixed-case name
    Student::factory()->create(['given_name' => 'Alice']);

    // Perform a GET request with a lowercased search query
    $response = get(route('home.index', ['search' => 'alice']));

    // Assert that the response contains the matching student
    $response->assertStatus(200)
             ->assertViewIs('home')
             ->assertViewHas('students', function ($students) {
                 return $students->count() === 1 && $students->first()->given_name === 'Alice';
             });
});

it('returns paginated results for a search query', function () {
    // Create a large number of students with matching names
    Student::factory()->count(25)->create(['surname' => 'Smith']);

    // Perform a GET request with a search query
    $response = get(route('home.index', ['search' => 'Smith']));

    // Assert that the response contains the first 10 matching students (pagination)
    $response->assertStatus(200)
             ->assertViewIs('home')
             ->assertViewHas('students', function ($students) {
                 return $students->count() === 10 && $students->total() === 25;
             });
});

