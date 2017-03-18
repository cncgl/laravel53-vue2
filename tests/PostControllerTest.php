<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\Post;

class PostControllerTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @dataProvider getTestDataForTestIndex
   */
  public function testIndex($index)
  {
    $mock = Mockery::mock(App\Services\PostService::class);
    $mock->shouldReceive('index')
      ->once()
      ->andReturn($index);
    App::singleton(App\Services\PostService::class, function () use ($mock) {
      return $mock;
    });

    $response = $this->call('GET', '/api/posts');
    $content = json_decode($response->getContent());
    $this->assertEquals(2, count($content));
  }

  public function getTestDataForTestIndex()
  {
    return [
      'index' => [
        [
          ['title' => 'title1', 'description' => 'description'],
          ['title' => 'title2', 'description' => 'desc2']
        ]
      ]
    ];
  }
}
