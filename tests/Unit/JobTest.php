<?php

use App\Models\Job;
use App\Models\Employer;

test('example', function () {
    expect(true)->toBeTrue();
});

test('belongs to an employer', function () {
    ///AAA Arrange Act Assert
    //Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id
    ]);

    //Act
    expect($job->employer->is($employer))->toBeTrue();
    expect(true)->toBeTrue();
});

it('can have tags', function () {
    ///AAA
    $job = Job::factory()->create();
    
    $job->tag('Frontend');
    expect($job->tags)->toHaveCount(1);
});