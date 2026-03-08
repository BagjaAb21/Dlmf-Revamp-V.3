<?php
// FILE: app/Observers/UserObserver.php
namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        if ($user->role === 'siswa') {
            $user->studentProfile()->create([
                'country' => 'Indonesia',
            ]);
        }
    }
}
