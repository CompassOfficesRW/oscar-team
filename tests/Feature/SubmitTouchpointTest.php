<?php

namespace Tests\Feature;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class SubmitTouchpointTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_submit_a_new_touchpoint() {
        $response = $this->post('/submit', [
            'subject' => 'aaa Example subject',
            'content' => 'Example content.',
        ]);

        $this->assertDatabaseHas('touchpoints', [
            'subject' => 'aaa Example subject'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('aaa Example subject');
    }

    /** @test */
    function touchpoint_is_not_created_if_validation_fails()
    {
        $response = $this->post('/submit');

        $response->assertSessionHasErrors(['subject', 'content']);
    }

    /** @test */
    function touchpoint_is_not_created_with_an_invalid_url()
    {
        $this->withoutExceptionHandling();

        $cases = ['TES'];

        foreach ($cases as $case) {
            try {
                $response = $this->post('/submit', [
                    'subject' => $case,
                    'content' => 'content',
                ]);
            } catch (ValidationException $e) {
                $this->assertEquals(
                    'The subject must start with one of the following: aaa.',
                    $e->validator->errors()->first('subject')
                );
                continue;
            }

            $this->fail("The subject $case passed validation when it should have failed.");
        }
    }

    /** @test */
    function max_length_fails_when_too_long()
    {
        $this->withoutExceptionHandling();

        $subject = str_repeat('a', 256);
        $content = str_repeat('a', 256);

        try {
            $this->post('/submit', compact('subject', 'content'));
        } catch(ValidationException $e) {
            $this->assertEquals(
                'The subject may not be greater than 255 characters.',
                $e->validator->errors()->first('subject')
            );

            $this->assertEquals(
                'The content may not be greater than 255 characters.',
                $e->validator->errors()->first('content')
            );

            return;
        }

        $this->fail('Max length should trigger a ValidationException');
    }

    /** @test */
    function max_length_succeeds_when_under_max()
    {

        $data = [
            'subject' => str_repeat('a', 255),
            'content' => str_repeat('a', 255),
        ];

        $this->post('/submit', $data);

        $this->assertDatabaseHas('touchpoints', $data);
    }

}
