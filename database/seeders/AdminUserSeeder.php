<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // ou User::find(1); si tu veux être précis
        if ($user) {
            $user->is_admin = true;
            $user->save();
            echo "L'utilisateur #{$user->id} est maintenant administrateur ✅\n";
        } else {
            echo "Aucun utilisateur trouvé ❌\n";
        }
    }
}
