<?php

namespace Tests\Feature;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LibroControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/libro');
        $response->assertSee("Libros");
        $response->assertStatus(200);
    }

    public function test_crear_noticia(): void{
        $libros = Libro::factory()->make();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post("libro.store", $libros->toArray());
        $response->assertRedirect("libro.index");
        $this->assertDatabaseHas("libros", $libros->toArray());
    }
}
