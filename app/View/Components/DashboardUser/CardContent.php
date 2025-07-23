<?php

namespace App\View\Components\UserDashboard;

use Illuminate\View\Component;

class CardContent extends Component
{
    public $card;

    public function __construct($card)
    {
        $this->card = $card;
    }

    public function render()
    {
        return view('components.user-dashboard.card-content');
    }
}
