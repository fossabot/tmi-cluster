<?php

namespace GhostZero\TmiCluster\Tests;

use GhostZero\TmiCluster\Contracts\Invitable;

class TestUser implements Invitable
{
    private string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getTwitchLogin(): ?string
    {
        return $this->login;
    }
}