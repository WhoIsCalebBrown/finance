<?php

namespace Tests\Services;

use App\Models\Account;
use App\Models\Transaction;

use App\Models\User;
use App\Services\NetWorthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NetWorthServiceTest extends TestCase
{
    use RefreshDatabase;
    public function testCalculateNetWorthForUser()
    {
        $user = User::factory()->create();

        $account1 = Account::create([
            'user_id' => $user->id,
            'name' => 'Checking',
            'type' => 'checking',
        ]);

        Transaction::factory()->count(2)->create(['account_id' => $account1->id, 'amount' => 100]);

        $netWorth = app(NetWorthService::class)->calculateNetWorthForUser($user);
        $this->assertEquals(200, $netWorth);
    }
}
