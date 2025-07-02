<?php

// app/Http/Controllers/ClassroomController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CardHome;

class UserController extends Controller
{
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return back()->with('success', 'Status updated successfully.');
    }
}
