<?php
/**
 * AcMenu plugin: an accordion menu for namespaces and relative pages.
 *
 * action.php: it defines all the methods used by AcMenu plugin
 *     who interact with DokuWiki's events.
 *
 * @author Torpedo <dcstoyanov@gmail.com>
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @package action
 */

if (!defined('DOKU_INC')) die();  // the plugin must be run within Dokuwiki

/**
 * This class defines all the methods used by the AcMenu plugin to interact
 * with the DokuWiki's events.
 *
 * It extends DokuWiki's basic action defined in lib/plugins/action.php.
 *
 * @package action_pycode
 */
class action_plugin_acmenu extends DokuWiki_Action_Plugin {

    /**
     * Here are registered the event handlers
     */
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook("DOKUWIKI_STARTED", "AFTER",  $this, "_add_start", array());
    }

    /**
     * It adds the name of the start page to the $JSINFO variable.
     *
     * @param (obj) $event the event object
     * @param (arr) $param data passed when this handler was registered
     */
    function _add_start(Doku_Event $event, $param) {
        global $conf;
        global $JSINFO;
        $JSINFO["start"] = $conf["start"];
        $JSINFO["useslash"] = $conf["useslash"];
    }
}
