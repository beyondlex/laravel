<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testApiCompanies() {
        $response = $this->json('POST', '/api/companies'/*, ['name'=>'au']*/);

        //HTTP TEST
        $response
            //返回状态断言
            ->assertStatus(200)
            //返回数据结构断言
            ->assertJsonStructure(
                [['id', 'code', 'name', 'created_at']]
            )
        ;
    }

    public function testDatabase() {
        $this->assertDatabaseHas('companies', [
            'name'=>'Green LLC'
        ]);
    }
}
