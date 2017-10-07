<?php

namespace App\Http\Controllers;

use App\ChatMessage;
use App\Staff;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if(auth()->check()) {
            $chatMessages = ChatMessage::with('user')->orderBy('created_at', 'DESC')->get()->take(100);
            $totalStaffs = Staff::count();
            $this->chatMessages = $chatMessages;
            $this->totalStaffs = $totalStaffs;
            view()->share('chatMessages', $this->chatMessages);
            view()->share('totalStaffs', $this->totalStaffs);
        }
    }
}
