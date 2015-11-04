<?php

namespace Doplus\ParatronicBundle\Service;

class DoplusRoleManager
{
    public function isUserForThisClient($id, $user) {
        if ($user->getRoles()[0] === "ROLE_ADMIN") {
            return 1;
        }
        else {
            if ($id != $user->getClient()->getId()) {
                    throw new \Exception("Vous n'êtes pas autorisé a naviguer ici !!!!");
                }
        }
    }
    
}