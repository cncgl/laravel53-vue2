<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testIndex()
  {
    // $mock = Mockery::mock(App\Services\PostService::class . '[index]')->shouldAllowMockingProtectedMethods();
    $mock = Mockery::mock(App\Services\PostService::class . '[index]');
    $mock->shouldReceive('index')->once()->andReturn($index);
    App::singleton(App\Services\PostService::class, function () use ($mock) {
      return $mock;
    });
  }
}
