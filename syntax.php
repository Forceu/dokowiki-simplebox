<?php
/**
 * DokuWiki Plugin Simplebox (Syntax Component)
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Marc Bulling
 */

if (!defined('DOKU_INC')) die();

class syntax_plugin_simplebox extends DokuWiki_Syntax_Plugin {

    public function getType() {
        return 'container';
    }

    public function getPType() {
        return 'block';
    }

    public function getAllowedTypes() {
        return array('container', 'formatting', 'substition');
    }

    public function getSort() {
        return 198;
    }

    public function connectTo($mode) {
        $this->Lexer->addSpecialPattern('{{simplebox>.*?}}', $mode, 'plugin_simplebox');
        $this->Lexer->addSpecialPattern('{{simplebox-linebreak}}', $mode, 'plugin_simplebox');
    }

    public function handle($match, $state, $pos, Doku_Handler $handler) {
        if ($match === '{{simplebox-linebreak}}') {
            return 'linebreak';
        } else {
            preg_match('/{{simplebox>(.*?)\|size=(\d+)\|content=(.*?)}}/', $match, $matches);
            return array(
                'color' => $matches[1],
                'size' => (int) $matches[2],
                'content' => $matches[3]
            );
        }
    }

    public function render($mode, Doku_Renderer $renderer, $data) {
        if ($mode !== 'xhtml') return false;

        if ($data === 'linebreak') {
            $renderer->doc .= '<br style="clear:both;" />';
        } else {
            $color = $data['color'];
            $size = $data['size'];
            $content = $data['content'];

            $renderer->doc .= '<div class="simplebox" style="background-color: '.$color.'; width: '.$size.'px; height: '.$size.'px; border-radius: 10px; display: inline-flex; justify-content: center; align-items: center; float: left; margin: 5px;"><b>'.$content."</b></div>\n";
        }

        return true;
    }
}
