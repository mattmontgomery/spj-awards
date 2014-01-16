<?php

namespace UtahSpj\AwardsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UtahSpjAwardsBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
