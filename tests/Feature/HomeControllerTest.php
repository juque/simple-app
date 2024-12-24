<?php

use App\Models\Student;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('returns the home view with paginated students', function () {
    // Crear datos de prueba
    Student::factory()->count(15)->create();

    // Realizar la solicitud GET
    $response = get(route('home.index'));

    // Verificar que la vista sea la correcta
    $response->assertStatus(200)
      ->assertViewIs('home')
      ->assertViewHas('students', function ($students) {
      	return $students->count() === 10; // Verificar que se paginan 10 estudiantes
      });

    // Verificar que el contenido de los estudiantes está en la vista
    $students = $response->viewData('students');
    expect($students->total())->toBe(15)
      ->and($students->perPage())->toBe(10)
      ->and($students->currentPage())->toBe(1);
});
