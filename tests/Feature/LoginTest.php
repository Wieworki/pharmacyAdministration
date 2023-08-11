<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test successful login
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $this->followingRedirects();
        $user = User::factory()->make(['nombre' => 'admin', 'password' => Hash::make('admin')]);
        $user->save();
        $this->call('POST','/login/submit', ['nombre' => 'admin', 'password' => 'admin']);
        $this->assertTrue(url()->current() == URL::to('/home'));
    }

    /**
     * Test failed login
     *
     * @return void
     */
    public function testFailedLogin()
    {
        $this->followingRedirects();
        $user = User::factory()->make(['nombre' => 'admin', 'password' => Hash::make('admin')]);
        $user->save();
        $this->call('POST','/login/submit', ['nombre' => 'admin', 'password' => '']);
        $this->assertTrue(url()->current() == URL::to('/login'));
    }
}
