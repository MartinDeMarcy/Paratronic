<?php

namespace Doplus\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DoplusUserBundle extends Bundle
{
    public function getParent()
  {
    return 'FOSUserBundle';
  }
}
