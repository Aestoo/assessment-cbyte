<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:delete-expired-secrets')->everyFifteenSeconds();
