<?php

namespace Intertech\Subscribe;

use Illuminate\Support\Facades\Route;

Route::get('subscribers/unsubscribe/{key}', 'Intertech\Subscribe\Handlers\ProcessSubscribers@unsubscribe');
