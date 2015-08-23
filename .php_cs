<?php

return Symfony\CS\Config\Config::create()
    ->fixers([
        '-blankline_after_open_tag',
        'no_blank_lines_before_namespace',
        'ereg_to_preg',
        'ordered_use',
        'php_unit_construct',
        'php_unit_strict',
        'phpdoc_order',
        'short_array_syntax',
        'strict',
        'strict_param',
    ])
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()->in(__DIR__)
    )
;
