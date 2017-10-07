<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'role'
    ];

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    public function includeRole(User $user)
    {
        $role = $user->role()->first();

        return $this->item($role, new RoleTransformer());
    }

}