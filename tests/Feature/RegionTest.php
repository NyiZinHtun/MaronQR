<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Region;

class RegionTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $region = factory('App\Region',5)->create();
        $response = $this->get('region');
        $response->assertStatus(200);
        // dd($response->getContent());
    }
    public function testarticle()
    {
        $region = factory('App\Region')->create();
        $response = $this->get('region',$region->toArray());
        $response->assertSee($region->name);
    }

   public function test_store() {
    $this->withoutExceptionHandling();
        $data = factory('App\Region')->make();
        $response = $this->post('region',$data->toArray());
        $response->assertRedirect('/region');
   }

   public function test_update()
   {
       $region = factory('App\Region')->create();
       $region->name = "updated name";
       $this->post('region/'. $region->id,$region->toArray());
       $this->assertDatabaseHas('regions',['id'=>$region->id,'name'=>'updated name']);
   }

   public function test_a_region_require_name() {
       $data = factory('App\Region')->raw(['name'=>'']);
       $this->post('region/')->assertSessionHasErrors('name');
   }
}
