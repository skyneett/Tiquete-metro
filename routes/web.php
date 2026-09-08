<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login-metro');

require __DIR__.'/formulariometro/webformulariometro.php';