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
 * Callbacks for the Reclaimed Wood theme.
 *
 * @package    theme_reclaimedwood
 * @copyright  2016 Frédéric Massart - FMCorz.net
 * @copyright  2026 Adam Jenkins <adam@wisecat.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * The main SCSS: Boost's preset wrapped in this theme's pre and post files.
 *
 * Boost's preset is taken from Boost's own settings, so a preset chosen on Boost's settings page still applies.
 *
 * @param \core\output\theme_config $theme The theme being built: this theme, or a child of it.
 * @return string SCSS
 */
function theme_reclaimedwood_get_main_scss_content($theme) {
    global $CFG;

    require_once($CFG->dirroot . '/theme/boost/lib.php');
    $pre = file_get_contents(__DIR__ . '/scss/reclaimedwood/pre.scss');
    $post = file_get_contents(__DIR__ . '/scss/reclaimedwood/post.scss');
    $boost = \core\output\theme_config::load('boost');
    return $pre . "\n" . theme_boost_get_main_scss_content($boost) . "\n" . $post;
}
