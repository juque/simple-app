<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('example feature test', function() {

  $response = $this->get('/');

  $response->assertStatus(200);

});
