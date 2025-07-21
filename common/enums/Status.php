<?php

namespace common\enums;

enum Status: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function isActive(): bool
    {
        return $this->value === self::ACTIVE;
    }

    public function isInactive(): bool
    {
        return $this->value === self::INACTIVE;
    }

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => '正常',
            self::INACTIVE => '停用',
        };
    }

    public function labelClass(): string
    {
        return match ($this) {
            self::ACTIVE => 'label-success',
            self::INACTIVE => 'label-danger',
        };
    }

    public static function options(): array
    {
        return [
            self::ACTIVE->value => self::ACTIVE->label(),
            self::INACTIVE->value => self::INACTIVE->label(),
        ];
    }
}
