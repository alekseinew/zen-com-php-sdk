<?php
declare(strict_types=1);

namespace Zen\Util;

trait ToArrayTrait
{
    /**
     * Converts the object's non-empty properties to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }
}
