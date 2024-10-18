<?php

namespace App\Interfaces;

use PhpParser\Node\Expr\Cast\Array_;

interface AuthRepositoryInterface
{
    /**
     * Check for authentication credentials
     *
     * @param array $data
     * @return []
     */
    public function login(array $credentials);
}