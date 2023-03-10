<?php

// Imported in public/index.php

/**
 * Use relatve path by default
 */
function route($name, $parameters = [], $absolute = false) {
    return app('url')->route($name, $parameters, $absolute);
}
