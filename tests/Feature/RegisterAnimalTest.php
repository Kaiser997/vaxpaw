<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Animal;
use app\Models\Vaccune;


class RegisterAnimalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login(){

        
        $carga = $this->get(route('login'));
        $carga ->assertStatus(200)->assertSee('login');

         
    }

    public function test_listaanimales(){

        // Crear un usuario y autenticarlo si la ruta está protegida
        $user = User::factory()->create();

        $this->actingAs($user);
        
        // Hacer una petición GET a la ruta
        $response = $this->get(route('animal.index'));

        // Verificar que la respuesta sea 200 (OK)
        $response->assertStatus(200)->assertSee('Lista de Animales');
    }

    public function test_listavacunas(){
        $user = User::factory()->create();

        $this->actingAs($user);

         // Hacer una petición GET a la ruta
         $response = $this->get(route('vacuna.lista'));

         // Verificar que la respuesta sea 200 (OK)
         $response->assertStatus(200)->assertSee('Lista de vacunas aplicadas');
    }

    public function test_listacitas(){

        $user = User::factory()->create();

        $this->actingAs($user);

         // Hacer una petición GET a la ruta
         $response = $this->get(route('animal.citas'));

         // Verificar que la respuesta sea 200 (OK)
         $response->assertStatus(200)->assertSee('Lista de Citas');
    }

    public function test_animalingresar()
{
    // Crear un usuario usando el factory de User
    $user = User::factory()->create();

    // Autenticar al usuario
    $this->actingAs($user);

    // Crear un animal usando el factory de Animal
    $animal = Animal::factory()->make(); // Usamos make() en lugar de create() para no persistirlo directamente

    // Enviar una solicitud POST a la ruta de creación de animales con los datos del animal
    $response = $this->post(route('animal.agregar'), [
        'name' => $animal->name,
        'race' => $animal->race,
        'age' => $animal->age,
        'sex' => $animal->sex,
        'user_id' => $user->id, // Asignar el ID del usuario autenticado
    ]);

    // Verificar que la respuesta sea una redirección
    $response->assertStatus(302)->assertRedirect(route('animal.agregado'));

    // Verificar que el animal se haya guardado en la base de datos
   
}
    public function test_vacunaingresar(){
         // Crear un usuario usando el factory de User
    $user = User::factory()->create();

    // Autenticar al usuario
    $this->actingAs($user);

    // Crear un animal usando el factory de Animal
    $vacuna = Vaccune::factory()->make(); // Usamos make() en lugar de create() para no persistirlo directamente
    $animal = Animal::factory()->make();

    // Enviar una solicitud POST a la ruta de creación de animales con los datos del animal
    $response = $this->post(route('vacuna.agregar'), [
        'name' => $vacuna->name,
        'description' => $vacuna->description,
        'dose' => $vacuna->dose,
        'date' => $vacuna->date,
        'animal_id' => $animal->id, 
    ]);

    // Verificar que la respuesta sea una redirección
    $response->assertStatus(302);

    // Verificar que el animal se haya guardado en la base de datos
    }

    public function test_citaingresar(){

        $user = User::factory()->create();

        // Autenticar al usuario
        $this->actingAs($user);
    
        // Crear un animal usando el factory de Animal
        $vacuna = Vaccune::factory()->make(); // Usamos make() en lugar de create() para no persistirlo directamente
        $animal = Animal::factory()->make();
    
        // Enviar una solicitud POST a la ruta de creación de animales con los datos del animal
        $response = $this->post(route('cita.agregar'), [
            'name' => $vacuna->name,
            'description' => $vacuna->description,
            'date' => $vacuna->date,
            'animal_id' => $animal->id, 
            'user_id' => $user->id,
        ]);
    
        // Verificar que la respuesta sea una redirección
        $response->assertStatus(302);

    }

    public function test_editaranimal(){
        
        // Crear un usuario y autenticarlo
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crear un animal para actualizar
    $animal = Animal::factory()->create(['user_id' => $user->id]);
    
    // Datos para actualizar el animal
    $updatedData = [
        'name' => 'Nuevo Nombre',
        'race' => 'Nueva Raza',
        'age' => 7,
        'sex' => 'male',
        'user_id' => $user->id,
    ];

    // Enviar una solicitud PUT a la ruta de actualización del animal con el ID del animal
    $response = $this->put(route('actualizar.animal', ['id' => $animal->id]), $updatedData);

    // Verificar que la respuesta sea una redirección
    $response->assertStatus(302)->assertRedirect(route('animal.index'));
    }

    public function test_eliminaranimal(){

        // Crear un usuario y autenticarlo
       $user = User::factory()->create();
        $this->actingAs($user);

        $animal = Animal::factory()->create(['user_id' => $user->id]);

        $response = $this->delete(route('delete.animal', ['id' => $animal->id]));

        $response->assertStatus(302)->assertRedirect(route('animal.index'));

    }
}