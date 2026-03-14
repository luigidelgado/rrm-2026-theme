<?php
/**
 * Clase base para todos los tests del tema RRM.
 *
 * @package RRM\Tests
 */

namespace RRM\Tests;

use Brain\Monkey;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase {

    protected function setUp(): void {
        parent::setUp();
        Monkey\setUp();

        // Mocks globales de WordPress que casi siempre se necesitan
        Monkey\Functions\stubs( [
            'esc_html'            => fn( $t ) => $t,
            'esc_attr'            => fn( $t ) => $t,
            'esc_url'             => fn( $t ) => $t,
            'esc_url_raw'         => fn( $t ) => $t,
            'esc_js'              => fn( $t ) => $t,
            'wp_kses_post'        => fn( $t ) => $t,
            'sanitize_text_field' => fn( $t ) => strip_tags( $t ),
            'sanitize_email'      => fn( $t ) => filter_var( $t, FILTER_SANITIZE_EMAIL ),
            'sanitize_textarea_field' => fn( $t ) => strip_tags( $t ),
            'absint'              => fn( $t ) => abs( (int) $t ),
            'wp_unslash'          => fn( $t ) => stripslashes( $t ),
            'wp_die'              => null,
            'wp_send_json_error'  => null,
            'wp_send_json_success'=> null,
        ] );
    }

    protected function tearDown(): void {
        Monkey\tearDown();
        parent::tearDown();
    }
}
