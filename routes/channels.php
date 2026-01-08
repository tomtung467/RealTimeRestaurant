<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Authorize private channel for per-table updates
Broadcast::channel('table.{tableNumber}', function ($user, $tableNumber) {
    // Allow any authenticated user; tighten if needed
    return true;
});
