<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class NetWorthService
{
    public function calculateNetWorthForUser(User $user): int
    {
        $user->accounts()
    }
}
