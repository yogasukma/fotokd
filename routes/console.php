<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:capture-photo')->everyFourHours();
