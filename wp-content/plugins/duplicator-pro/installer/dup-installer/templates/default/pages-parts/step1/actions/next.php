<?php
/**
 *
 * @package templates/default
 *
 */
defined('ABSPATH') || defined('DUPXABSPATH') || exit;
?>
<div id="next_action" class="bottom-step-action no-display" >           
    <div class="footer-buttons margin-top-2">
        <div class="content-left">
            <?php
            dupxTplRender('pages-parts/step1/terms-and-conditions');
            DUPX_Params_Manager::getInstance()->getHtmlFormParam(DUPX_Params_Manager::PARAM_ACCEPT_TERM_COND);
            ?>
        </div>
        <div class="content-right" >
            <button 
                id="s1-deploy-btn" 
                type="button" 
                title="<?php echo DUPX_U::esc_attr('To enable this button the checkbox above under the "Terms & Notices" must be checked.'); ?>" 
                class="default-btn">
                Next <i class="fa fa-caret-right"></i>
            </button>
        </div>
    </div>
</div>