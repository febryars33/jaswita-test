<?php

namespace App\Http\Controllers;

use App\Models\Manager;

abstract class Controller extends \Illuminate\Routing\Controller
{
    public function isManager(): bool
    {
        if (request()->user()->userable_type === Manager::class) {
            return true;
        }

        return false;
    }

    public function getCurrentBranch()
    {
        if ($this->isManager()) {
            return request()->user()->userable->branch->id;
        }

        return null;
    }
}
