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
 * Settings for the Reclaimed Wood theme.
 *
 * The settings carry the names Boost reads from the active theme's own settings (theme_boost_get_pre_scss(),
 * theme_boost_get_extra_scss() and the block manager), so the raw SCSS boxes and the unaddable blocks keep
 * working under this child theme. Modelled on Boost's settings.php.
 *
 * @package    theme_reclaimedwood
 * @copyright  2016 Ryan Wyllie
 * @copyright  2026 Adam Jenkins <adam@wisecat.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs(
        'themesettingreclaimedwood',
        get_string('configtitle', 'theme_reclaimedwood')
    );

    // General tab.
    $page = new admin_settingpage('theme_reclaimedwood_general', get_string('generalsettings', 'theme_boost'));

    $setting = new admin_setting_configtext(
        'theme_reclaimedwood/unaddableblocks',
        get_string('unaddableblocks', 'theme_boost'),
        get_string('unaddableblocks_desc', 'theme_boost'),
        'navigation,settings,course_list',
        PARAM_TEXT
    );
    $page->add($setting);

    $settings->add($page);

    // Advanced tab.
    $page = new admin_settingpage('theme_reclaimedwood_advanced', get_string('advancedsettings', 'theme_boost'));

    $setting = new admin_setting_scsscode(
        'theme_reclaimedwood/scsspre',
        get_string('rawscsspre', 'theme_boost'),
        get_string('rawscsspre_desc', 'theme_boost'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_scsscode(
        'theme_reclaimedwood/scss',
        get_string('rawscss', 'theme_boost'),
        get_string('rawscss_desc', 'theme_boost'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
