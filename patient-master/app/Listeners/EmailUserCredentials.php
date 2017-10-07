<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class EmailUserCredentials implements ShouldQueue
{
    /**
     * EmailUserCredentials constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $user = $event->user_data;

        // update auto generated password
        $password = str_random(10);
        $user->password = bcrypt($password);
        $user->save();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password
        ];
        $this->mailer->send('admin.emails.user-created', $data, function($message) use ($user) {
            $message->from(env('MAIL_ADMIN','senthaneng@gmail.com'), 'Teaching Hospital Jaffna');
            $message->to($user->email)->subject('User Account | Teaching Hospital Jaffna');
        });
    }
}
