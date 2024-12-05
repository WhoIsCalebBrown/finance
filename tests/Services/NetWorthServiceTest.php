<?php

namespace Tests\Services;

use App\Models\Account;
use App\Models\Transaction;

use App\Models\User;
use App\Services\NetWorthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;;

class NetWorthServiceTest extends TestCase
{
    use RefreshDatabase;
    public function testCalculateNetWorthForUser()
    {
        $user = User::factory()->create();

        $account = Account::create([
            'user_id' => $user->id,
            'name' => 'Credit Card',
            'type' => 'savings',
        ]);

        $transaction = Transaction::factory()->count(10)->create(['account_id' => $account->id]);

        $this->fail();
    }
}
