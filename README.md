# Music-Director
A powerful and easy to use tool for the church Music Director. Song archive, scheduler and much more.

## Advanced Custom Fields dependency

Music Director now expects the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) plugin to be installed separately. Version 6.x or later is required. Install and activate the plugin from the WordPress.org repository (or manage it via Composer/WPackagist) before activating Music Director.

## Migration notes

* The bundled copy of ACF has been removed. Install the standalone plugin prior to updating the Music Director plugin.
* Field registrations now use the current `acf_add_local_field_group()` API. Field keys remain unchanged, so existing song metadata will continue to work without needing to re-save posts.
* After upgrading, log in to the WordPress dashboard. If Advanced Custom Fields prompts you to run its database upgrade, follow the instructions provided by the plugin.
