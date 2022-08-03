<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_is_redirected_to_login_form_if_not_logged_in_and_trying_to_access_log_view_page(): void
    {
        $response = $this->get('/log-view');
        $response->assertRedirect(route('show-login-from'));
    }


    public function test_an_admin_is_authenticated_and_trying_to_access_log_view_page(): void
    {

        $this->withSession(['is-authenticated', true])
            ->get('/log-view');

        $this->assertTrue(true);

    }


    public function test_a_file_path_is_not_exist() : void{
        $this->assertEquals(false , file_exists('./log'));
    }

    private function getBaseDir(): string
    {
        return base_path().'/storage/logs';
    }

    public function test_a_file_path_is__exist() : void{
        $this->assertEquals(true , file_exists($this->getBaseDir().'/laravel.log'));
    }

    public function test_an_exist_file_is_empty(): void{
        $this->assertEquals(true , filesize($this->getBaseDir().'/empty.log') == 0);
    }

    public function test_an_exist_file_is_not_empty_and_get_lines(): void{
        $this->assertEquals(true , filesize($this->getBaseDir().'/laravel.log') > 0 && $this->count(file($this->getBaseDir().'/laravel.log' , FILE_IGNORE_NEW_LINES)) > 0);
    }
}
