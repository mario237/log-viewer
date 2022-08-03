<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_login_form(): void
    {
        $response = $this->get(route('show-login-from'));

        $response->assertStatus(200);
    }


    public function test_is_not_admin(){

        $this->post('/login', [
            'username' => 'user',
            'password' => 'user',
        ])->assertRedirect('/');

    }

    public function test_admin_login(){
       $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);


        $this->assertEquals(true, session('is-authenticated'));

        $response->assertRedirect('/log-view');
    }

}
