<?php

use Illuminate\Support\Str;
use App\Models\User;

if (!function_exists('generateHumanReadable')) {
    function generateHumanReadable(int $words = 2, int $number = 2): string
    {
        $adjectives = ['sun','blue','happy','quick','tiny','smart','red','green','wild','calm'];
        $nouns = ['cat','dog','star','bird','leaf','moon','stone','river','tree','cloud'];

        $parts = [];
        for ($i = 0; $i < $words; $i++) {
            $parts[] = ($i % 2 === 0)
                ? $adjectives[array_rand($adjectives)]
                : $nouns[array_rand($nouns)];
        }

        $num = str_pad((string)random_int(0, (int)str_repeat('9', $number)), $number, '0', STR_PAD_LEFT);

        return implode('-', $parts) . '-' . $num;
    }
}

if (!function_exists('generate_email')) {
    function generate_email(?string $name = null, string $domain = 'kids.local'): string
    {

        $base = $name ? Str::slug(Str::before($name, ' ')) : 'child';

        $suffix = Str::lower(Str::random(4));

        $email = "{$base}.{$suffix}@{$domain}";

        while (User::where('email', $email)->exists()) {
            $suffix = Str::lower(Str::random(4));
            $email = "{$base}.{$suffix}@{$domain}";
        }

        return $email;
    }
}







