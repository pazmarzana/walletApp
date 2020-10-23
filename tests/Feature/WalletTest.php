<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wallet;
use App\Models\Transfer;

class WalletTest extends TestCase
{
    use  RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWallet()
    {
        // $wallet = Wallet::factory()->create();
        // $transfer = Transfer::factory()->count(3)->create([
        //     'wallet_id'=> $wallet->id
        // ]);
        $wallet = Wallet::factory()
            ->hasTransfers(3)->create();

        $response = $this->json('GET','/api/wallet');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        'id','money','transfers' => [
                            '*' => [
                                'id','amount','description','wallet_id'
                            ]
                        ]



                    ]);
        $this->assertCount(3, $response->json()['transfers']);
    }
}
