<?php

function get_default_avatar(string $name): string {
    return "https://ui-avatars.com/api/?background=black&color=ffffff&name=" . urlencode($name);
}
