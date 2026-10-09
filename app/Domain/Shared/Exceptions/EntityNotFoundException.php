<?php

namespace App\Domain\Shared\Exceptions;

use Exception;

class EntityNotFoundException extends Exception
{
    public static function forEntity(string $entity, string|int $identifier): self
    {
        return new self("Domain entity [{$entity}] with identifier [{$identifier}] was not found.");
    }
}
