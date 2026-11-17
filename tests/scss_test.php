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

namespace theme_reclaimedwood;

use PHPUnit\Framework\Attributes\CoversFunction;

/**
 * Tests that the theme's SCSS compiles and carries the 1.9 wood textures, colours and fonts.
 *
 * @package    theme_reclaimedwood
 * @copyright  2026 Adam Jenkins <adam@wisecat.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversFunction('theme_reclaimedwood_get_main_scss_content')]
final class scss_test extends \advanced_testcase {
    /**
     * The compiled stylesheet contains the theme's rules, so the SCSS compiled without an error.
     *
     * Core serves Boost's precompiled CSS when a child's SCSS fails to compile, so a stylesheet with none of the
     * theme's rules is the failure this test catches.
     */
    public function test_scss_compiles_with_theme_rules(): void {
        $this->resetAfterTest();

        $theme = \core\output\theme_config::load('reclaimedwood');
        $css = $theme->get_css_content_debug('scss', null, null);

        $this->assertNotEmpty($css);
        // The 1.9 font stack.
        $this->assertMatchesRegularExpression('/--bs-font-sans-serif:\s*Arial,\s*Verdana,\s*Helvetica,\s*sans-serif/', $css);
        // The 1.9 textures, resolved to this theme's image URLs.
        foreach (['background', 'gradient1', 'gradient2', 'gradient3', 'gradient4'] as $image) {
            $this->assertMatchesRegularExpression('~/theme/image\.php/reclaimedwood/theme/[^/]+/wood/' . $image . '"~', $css);
        }
        // The 1.9 colours.
        $this->assertMatchesRegularExpression('/#(330000|300)\b/i', $css);
        $this->assertMatchesRegularExpression('/#(990000|900)\b/i', $css);
    }

    /**
     * The main SCSS wraps Boost's preset in this theme's own files.
     */
    public function test_main_scss_wraps_boost_preset(): void {
        $theme = \core\output\theme_config::load('reclaimedwood');
        $scss = theme_reclaimedwood_get_main_scss_content($theme);

        $pre = strpos($scss, '$rw-ink');
        $preset = strpos($scss, '@import "bootstrap"');
        $post = strpos($scss, '[[pix:theme|wood/');
        $this->assertNotFalse($pre);
        $this->assertNotFalse($preset);
        $this->assertNotFalse($post);
        $this->assertLessThan($preset, $pre);
        $this->assertLessThan($post, $preset);
    }
}
