<?php

it('can connect to the database', function () {
    expect(DB::connection())->not->toBeNull();
});

