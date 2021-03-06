<?php

/**
 * REST point to get duplicator and wordpress versions
 *
 * @package Duplicator
 * @copyright (c) 2021, Snapcreek LLC
 *
 */

namespace Duplicator\RESTPoints;

class Versions extends \Duplicator\Core\REST\AbstractRESTPoint
{

    protected function getRoute()
    {
        return '/versions';
    }

    /**
     *
     * @global type $wp_version
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    protected function respond(\WP_REST_Request $request)
    {
        global $wp_version;

        $versions = array(
            'wp'  => $wp_version,
            'dup' => DUPLICATOR_PRO_VERSION,
        );

        return new \WP_REST_Response($versions, 200);
    }

    /**
     *
     * @param \WP_REST_Request $request
     * @return \WP_Error|boolean
     */
    public function permission(\WP_REST_Request $request)
    {
        if (!current_user_can('manage_options') || !check_ajax_referer('wp_rest', false, false)) {
            return new \WP_Error('rest_forbidden', esc_html__('You cannot execute this action.'));
        }
        return true;
    }
}
