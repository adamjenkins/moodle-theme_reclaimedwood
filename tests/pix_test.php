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

use PHPUnit\Framework\Attributes\CoversNothing;

/**
 * Tests that the 1.9 default user picture replaces core's.
 *
 * @package    theme_reclaimedwood
 * @copyright  2026 Adam Jenkins <adam@wisecat.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversNothing]
final class pix_test extends \advanced_testcase {
    /**
     * Each default user picture core asks for resolves to this theme's copy of the 1.9 smiley.
     */
    public function test_default_user_pictures_come_from_the_theme(): void {
        $theme = \core\output\theme_config::load('reclaimedwood');
        foreach (['u/f1', 'u/f2', 'u/f3'] as $image) {
            $location = $theme->resolve_image_location($image, 'core', false);
            $this->assertSame(realpath(__DIR__ . '/../pix_core/' . $image . '.png'), realpath($location), $image);
        }
    }
}
