<?php

use Symfony\CS\Config\Config;
use Symfony\CS\FixerInterface;
use Symfony\CS\Finder\DefaultFinder;
use Symfony\CS\Fixer\Contrib\HeaderCommentFixer;

HeaderCommentFixer::setHeader(file_get_contents ('Resources/doc/file-header.md'));

$finder = DefaultFinder::create()
    ->notName('LICENSE')
    ->notName('README.md')
    ->notName('phpunit.xml*')
    ->notName('*.phar')
    ->exclude('vendor')
    ->exclude('var')
    ->exclude('Resources')
    ->in(__DIR__);

return Config::create()
    ->fixers([
        'yoda_conditions',
        'align_double_arrow',
        'header_comment',
        'multiline_spaces_before_semicolon',
        'ordered_use',
        'phpdoc_order',
        'phpdoc_var_to_type',
        'strict',
        'strict_param',
        'short_array_syntax',
        'php_unit_strict',
        'php_unit_construct',
        'newline_after_open_tag',
        'ereg_to_preg',
        'short_echo_tag',
        'pre_increment',
    ])
    ->level(FixerInterface::SYMFONY_LEVEL)
    ->setUsingCache(true)
    ->finder($finder);
