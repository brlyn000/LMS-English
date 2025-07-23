<?php

namespace App\View\Components\DashboardUser;

use Illuminate\View\Component;

class ProfileCard extends Component
{
    public $courseCompletion;
    public $assignmentSubmission;
    public $forumParticipation;
    public $cardHome;

    public function __construct($courseCompletion = 0, $assignmentSubmission = 0, $forumParticipation = 0, $cardHome = [])
    {
        $this->courseCompletion = $courseCompletion;
        $this->assignmentSubmission = $assignmentSubmission;
        $this->forumParticipation = $forumParticipation;
        $this->cardHome = $cardHome;
    }

    public function render()
    {
        return view('components.dashboard-user.profile-card');
    }
}
