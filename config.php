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
 * Reclaimed Wood theme configuration: a child of Boost.
 *
 * The keys core does not inherit from a parent are restated from Boost's config.php
 * (public/theme/boost/config.php).
 *
 * @package    theme_reclaimedwood
 * @copyright  2016 Frédéric Massart
 * @copyright  2026 Adam Jenkins <adam@wisecat.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');

$THEME->name = 'reclaimedwood';
$THEME->parents = ['boost'];

// All CSS comes from SCSS. editor_scss is left unset so Boost's editor styles are inherited.
$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->usefallback = true;

// Main SCSS: this theme's pre.scss, Boost's preset, then this theme's post.scss.
$THEME->scss = function ($theme) {
    return theme_reclaimedwood_get_main_scss_content($theme);
};

// Boost's own pre and extra SCSS callbacks also run for a child theme, and they already add this theme's
// "scsspre" and "scss" settings, so this theme adds no callback of its own.

// Not inherited from Boost: restated (public/theme/boost/config.php).
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;
$THEME->yuicssmodules = [];
$THEME->activityheaderconfig = ['notitle' => true];
