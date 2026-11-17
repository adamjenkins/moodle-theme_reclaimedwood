# Reclaimed Wood (theme_reclaimedwood)

A Boost child theme for Moodle 5.3 that brings back the campy plywood look of the Moodle 1.9 **Wood** theme:
a wood-grain page, panelled blocks, a plank navbar and page header, carved-look headings and the old
sliding-door tabs, reusing the original 1.9 images.

It stays faithful to the original:

- **The 1.9 colours:** #330000 ink, #990000 links, and the #FFCC99/#330000 bevel on every panel.
- **The 1.9 fonts:** Arial, Verdana, Helvetica, sans-serif, with bold headings, as Wood inherited them from the
  1.9 Standard theme.
- **The 1.9 texture map:** dark plywood page, medium planks for bars and headers, pale wood for content, blocks,
  course sections, cards, activity descriptions and grade tables.
- **The 1.9 default user picture:** the yellow smiley with sunglasses for every user who has no picture.
- **Dark colour mode.** Moodle 5.3 can switch Boost-based themes to dark (Boost's settings); the wood is then
  varnished dark and the text turns light, so the theme still reads in that mode.

## Requirements

- Moodle 5.3 (`$plugin->supported = [503, 503]`).
- Boost (always installed with Moodle).

## Installation

Copy the theme to `theme/reclaimedwood` (inside `public/` in a 5.3 code tree), visit Site administration >
Notifications, then choose **Reclaimed Wood** under Site administration > Appearance > Themes (Select theme).

## Settings

Site administration > Appearance > Custom theme settings > Reclaimed Wood:

- **General:** unaddable blocks (as in Boost).
- **Advanced:** raw initial SCSS and raw SCSS (as in Boost).

The wood palette can be changed through the raw initial SCSS: every `$rw-*` variable in
`scss/reclaimedwood/pre.scss` has a `!default`.

## Credits

- **Wood** for Moodle 1.5-1.9 was made by **Eloy Lafuente (stronk7)** in 2005. The textures in `pix/wood/`
  (`background.jpg`, `gradient1-4.jpg`), the tab images in `pix/wood/tab/`, the switch icons and the favicon are
  the original files from `theme/wood` in Moodle's `MOODLE_19_STABLE` branch, and the colours and the texture map
  follow his `styles_color.css`.
- **Julian Ridden** rebuilt Wood on Bootstrap for Moodle 2.5 in 2013
  ([moodleman/moodle-theme_wood](https://github.com/moodleman/moodle-theme_wood), copyright line
  "2013 Moodle, moodle.org"). The idea of panels over a full-page wood background with an inset shadow comes
  from his version.
- The default user picture (`pix_core/u/f1-f3.png`) is Moodle 1.9's `pix/u/f1.png` and `f2.png`, made by
  **Martin Dougiamas** (2003) and tidied by "bawjaws" (2005, outline removed), per the Git history of `pix/u/f1.png`
  on `MOODLE_19_STABLE`. `f3.png` (core's large size) is a copy of the 100px `f1.png`.
- Configuration and settings follow Boost's (Frédéric Massart, Ryan Wyllie).

## Licence

GNU GPL v3 or later; see `LICENSE`.

Copyright 2026 Adam Jenkins <adam@wisecat.net>.
