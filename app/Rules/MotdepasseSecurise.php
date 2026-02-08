<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MotdepasseSecurise implements ValidationRule
{
    private int $minLength;

    public function __construct(int $minLength = 12)
    {
        $this->minLength = $minLength;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strlen($value) < $this->minLength) {
            $fail("Le mot de passe doit contenir au moins {$this->minLength} caractères.");
            return;
        }

        if (!preg_match('/[A-Z]/', $value)) {
            $fail('Le mot de passe doit contenir au moins une majuscule (A-Z).');
            return;
        }

        if (!preg_match('/[a-z]/', $value)) {
            $fail('Le mot de passe doit contenir au moins une minuscule (a-z).');
            return;
        }

        if (!preg_match('/[0-9]/', $value)) {
            $fail('Le mot de passe doit contenir au moins un chiffre (0-9).');
            return;
        }

        if (!preg_match('/[!@#$%^&*(),.?":{}|<>_\-=+\[\]\\\\\/]/', $value)) {
            $fail('Le mot de passe doit contenir au moins un caractère spécial (!@#$%^&*...).');
            return;
        }
    }
}
