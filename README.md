# Music-Director

A powerful and easy to use tool for the church Music Director. Song archive, scheduler and much more.

## REST API

Music Director now exposes its data through the WordPress REST API so that mobile apps, headless front-ends, and integrations can reuse the curated song catalogue.

### Songs

* `GET /wp-json/wp/v2/music-director-songs`
  * Lists song posts. Each item includes the default WordPress fields plus a `music_director` object that contains:
    * `highlighted_lyrics` – sanitized HTML pulled from the **Highlighted Lyrics** field.
    * `resources` – URLs for lead sheets, chord sheets, YouTube, and Spotify references.
    * `taxonomies` – associated Keys, Tempos, Themes, and Performers (each entry includes `id`, `name`, and `slug`).
* `GET /wp-json/wp/v2/music-director-songs/<id>`
  * Retrieves a single song. The custom meta fields listed above may also be updated via `POST`/`PUT` requests by sending values inside the `meta` object using the keys `highlighted_lyrics`, `lead_sheet`, `chord_sheet`, `youtube_link`, and `spotify_link`.

### Taxonomies

The related taxonomies are now also available in the REST API:

* `GET /wp-json/wp/v2/music-director-keys`
* `GET /wp-json/wp/v2/music-director-tempos`
* `GET /wp-json/wp/v2/music-director-themes`
* `GET /wp-json/wp/v2/music-director-performers`

Each endpoint exposes the taxonomy term data so that front-ends can build filters, dropdowns, and other selection UI that mirror the WordPress admin.

### Block Editor Templates

Song posts open with a curated block template tailored for rehearsal notes, highlighted lyrics, and resource links. A reusable **Song Resources Summary** block pattern is also registered (under the “Music Director” category) so editors can quickly drop consistent layouts into existing posts.
