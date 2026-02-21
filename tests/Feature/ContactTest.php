<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function user_can_create_contact()
    {
        $this->authenticate();

        $response = $this->post('/contacts', [
            'name' => 'John Smith',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect('/contacts');

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Smith',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function name_must_have_minimum_length()
    {
        $this->authenticate();

        $response = $this->post('/contacts', [
            'name' => 'John',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function contact_must_have_exactly_9_digits()
    {
        $this->authenticate();

        $response = $this->post('/contacts', [
            'name' => 'John Smith',
            'contact' => '12345',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('contact');
    }

    /** @test */
    public function email_must_be_unique()
    {
        $this->authenticate();

        Contact::factory()->create([
            'email' => 'john@example.com',
            'contact' => '123456789',
        ]);

        $response = $this->post('/contacts', [
            'name' => 'Another User',
            'contact' => '987654321',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function user_can_update_contact()
    {
        $this->authenticate();

        $contact = Contact::factory()->create();

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'Updated Name',
            'contact' => '111222333',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect('/contacts');

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'Updated Name',
            'contact' => '111222333',
            'email' => 'updated@example.com',
        ]);
    }

    /** @test */
    public function user_can_soft_delete_contact()
    {
        $this->authenticate();

        $contact = Contact::factory()->create();

        $response = $this->delete("/contacts/{$contact->id}");

        $response->assertRedirect('/contacts');

        $this->assertSoftDeleted('contacts', [
            'id' => $contact->id,
        ]);
    }
}