<?php

namespace Ges\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
      public function getParent(){
          //get parent object from FOSUserBundle
          return "FOSUserBundle";
      }
}
