<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$users = App\Models\User::all();

echo "=== Daftar User ===" . PHP_EOL;
foreach ($users as $u) {
    echo "ID: " . $u->id . " | Name: " . $u->name . " | Email: " . $u->email . " | Role: " . ($u->role ?? 'null') . PHP_EOL;
}