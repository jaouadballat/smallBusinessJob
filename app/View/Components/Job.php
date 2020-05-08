<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Job extends Component
{

    public $job;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Job $job
     */

    public function __construct(\App\Models\Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.job');
    }
}
