<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class NetWorthService
{
    public function calculateNetWorthForUser(User $user): int
    {
        $accounts = $user->accounts()->with('transactions')->get()->toArray();

        return collect($accounts)->sum(function ($account) {
            return collect($account['transactions'])->sum('amount');
        });
    }

}
