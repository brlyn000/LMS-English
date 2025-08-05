<?php

// app/Http/Controllers/ClassroomController.php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Material;
use App\Models\Module;
use App\Models\Reply;
use App\Models\Submission;
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

    public function index()
    {
        $user = auth()->user();

        $card_home = CardHome::where('status', 'Active')->orderBy('name')->get();

        $totalModules = Module::count();
        $completedModules = Submission::where('user_id', '=', $user->id)
            ->distinct('material_id')
            ->count('material_id');
        $courseCompletion = $totalModules ? round(($completedModules / $totalModules) * 100) : 0;

        $totalAssignments = Material::count();
        $userSubmissions = Submission::where('user_id', '=', $user->id)->count();
        $assignmentSubmission = $totalAssignments ? round(($userSubmissions / $totalAssignments) * 100) : 0;

        $totalThreads = Reply::count();
        $userReplies = Reply::where('user_id', '=', $user->id)->count();
        $forumParticipation = $totalThreads ? round(($userReplies / $totalThreads) * 100) : 0;

        // Recent Activity
        $activities = ActivityLog::with('user')->latest()->take(10)->get(); // recent 10

        $materials = Material::count();

        return view('dashboard', compact(
            'card_home',
            'courseCompletion',
            'assignmentSubmission',
            'forumParticipation',
            'activities',
            'materials'
        ));
    }
}
