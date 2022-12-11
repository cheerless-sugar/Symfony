<?php

namespace App\Services;

use App\Entity\Performance;
use App\Entity\Role;

class ActorFeeService
{
   public function getActorFee(Performance $performance, Role $role)
   {
      return $performance->getBudget() * $role->getFee();
   }
}
