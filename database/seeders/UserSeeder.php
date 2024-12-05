<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $accounts = [
            [
                'name' => 'Checking Account',
                'type' => 'checking',
                'balance' => 5000_00, // $5,000
            ],
            [
                'name' => 'Savings Account',
                'type' => 'savings',
                'balance' => 10000_00, // $10,000
            ],
            [
                'name' => 'Credit Card',
                'type' => 'credit',
                'balance' => -2000_00, // -$2,000
            ],
        ];

        foreach ($accounts as $accountData) {
            $account = Account::create([
                'user_id' => $user->id,
                'name' => $accountData['name'],
                'type' => $accountData['type'],
                'balance' => $accountData['balance'],
            ]);

            // Generate 100+ transactions for each account
            $categories = Category::all();

            // Create transactions for the last 6 months
            for ($i = 0; $i < 120; $i++) {
                $isExpense = rand(0, 1);
                $amount = $isExpense ?
                    -rand(500, 50000) : // -$5 to -$500
                    rand(100000, 500000); // $1,000 to $5,000

                Transaction::create([
                    'account_id' => $account->id,
                    'amount' => $amount,
                    'description' => $isExpense ?
                        fake()->words(3, true) :
                        'Salary Deposit',
                    'category_id' => $categories->random()->id,
                    'transaction_date' => fake()->dateTimeBetween('-6 months', 'now'),
                ]);
            }
        }
    }
}
