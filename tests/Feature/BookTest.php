<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test api POST /api/books
     */
    public function test_api_add_book(): void
    {
        $this->seed();

        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->post('/api/books', ['title' => 'test book', 'authors' => [1, 2]]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
            ]);

        $this->assertDatabaseHas('books', [
            'title' => 'test book',
        ]);
    }

    /**
     * Test api DELETE /api/books/{id}
     */
    public function test_api_book_delete(): void
    {
        $book = Book::factory()->create();
        $this->assertModelExists($book);

        $response = $this->delete('/api/books/'.$book->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
            ]);

        $this->assertModelMissing($book);
    }
}
