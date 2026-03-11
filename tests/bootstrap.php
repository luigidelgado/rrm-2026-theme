<?php
/**
 * Bootstrap para tests del tema RRM 2026.
 * Usa Brain\Monkey para mockear funciones de WordPress.
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Brain\Monkey;

// Inicializar Brain\Monkey antes de cada test (se hace en TestCase base)
