<?php
namespace StoreKit;

/**
 * Scripts and Styles Class
 */
class Assets {

    function __construct() {

        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register() {
        $this->register_styles( $this->get_styles() );
        $this->register_scripts( $this->get_scripts() );
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function register_styles( $styles ) {
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, STOREKIT_VERSION );
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function register_scripts( $scripts ) {
        foreach( $scripts as $handle => $script ){
            $deps       = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer  = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version    = isset( $script['version'] ) ? $script['version'] : STOREKIT_VERSION;

            wp_register_script( $handle, $script[ 'src' ], $deps, $version, $in_footer );
        }
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles() {

        $styles = [
            'storekit-frontend' => [
                'src' =>  STOREKIT_ASSETS . '/css/frontend.css'
            ]
        ];

        return $styles;
    }

    /**
     * Get registered scripts
     *
     * @return array
     */
    public function get_scripts(){
        $scripts = [
            'storekit-frontend' => [
                'src'       => STOREKIT_ASSETS . '/js/frontend.js',
                'deps'      => [ 'jquery' ],
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

}
