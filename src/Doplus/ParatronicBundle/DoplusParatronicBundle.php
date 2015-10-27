<?php

namespace Doplus\ParatronicBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DoplusParatronicBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
