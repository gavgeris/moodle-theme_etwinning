<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme functions.
 *
 * @package    theme_etwinning
 * @copyright  2021 George Avgeris
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function theme_etwinning_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');

    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_etwinning', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_etwinning and not theme_boost (see the line above).
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }
    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.
//    $pre = file_get_contents($CFG->dirroot . '/theme/etwinning/scss/pre.scss');
    $pre = "";
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.
    $post = file_get_contents($CFG->dirroot . '/theme/etwinning/style/etwinning.css');
    $post .= file_get_contents($CFG->dirroot . '/theme/etwinning/style/notebook.css');
    // Combine them together.
    return $pre  . "\n" . $scss . "\n" . $post;
}

function theme_etwinning_get_precompiled_css() {
    global $CFG;
    return file_get_contents($CFG->dirroot . '/theme/etwinning/style/etwinning.css');
}