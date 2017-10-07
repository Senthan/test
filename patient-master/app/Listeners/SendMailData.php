<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Patient;
use App\Transformers\PatientTransformer;
use App\User;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class SendMailData implements ShouldQueue
{
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(SendMail $event)
    {
        $data = Patient::whereIn('patient_uuid', $event->data)->get();
        $staff = $data[0]->diagnosis()->get()->last() ? $data[0]->diagnosis()->get()->last()->staff : null;
        if(isset($staff)) {
            $resource = new Collection($data, new PatientTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());
            $data = $manager->createData($resource)->toArray();
            $data['data']['staffName'] = $staff->first_name.' '.$staff->last_name;
            $data['data']['staffDesignation'] = $staff->designation ? $staff->designation->name : 'Consultant Surgeon';
            $data['data']['date'] = Carbon::parse($data['data'][0]['date'])->format('l jS \\of F Y');

            $user = User::all()[0];
            $this->mailer->send('admin.emails.patient-status', $data, function($message) use ($user, $staff) {
                $message->from(env('MAIL_ADMIN','senthaneng@gmail.com'), 'Teaching Hospital Jaffna');
                $message->to($staff->email)->subject('Hospital Database Management | Teaching Hospital Jaffna');
            });
        }
    }
}
