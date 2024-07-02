<?php

use app\Http\Controllers\PacienteController;
use app\Http\Controllers\ConsultaController;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('consultas', ConsultaController::class);
