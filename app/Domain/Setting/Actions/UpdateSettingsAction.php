<?php

namespace App\Domain\Setting\Actions;

use App\Domain\Setting\Repositories\SettingRepositoryInterface;

class UpdateSettingsAction
{
    public function __construct(private SettingRepositoryInterface $repository) {}

    public function execute(array $settings): void
    {
        foreach ($settings as $key => $value) {
            $this->repository->set($key, $value);
        }
    }
}
