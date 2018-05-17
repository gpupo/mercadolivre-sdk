<?php

$workspace = explode('/', __DIR__);
$projectName = end($workspace);
$template = <<<'EOF'
This file is part of gpupo/%s
Created by Gilmar Pupo <contact@gpupo.com>
For the information of copyright and license you should read the file
LICENSE which is distributed with this source code.
Para a informação dos direitos autorais e de licença você deve ler o arquivo
LICENSE que é distribuído com este código-fonte.
Para obtener la información de los derechos de autor y la licencia debe leer
el archivo LICENSE que se distribuye con el código fuente.
For more information, see <https://opensource.gpupo.com/>.

EOF;

$header = sprintf($template, $projectName);
$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP56Migration' => true,
        '@PHPUnit60Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'align_multiline_comment' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'escape_implicit_backslashes' => true,
        'explicit_indirect_variable' => true,
        'explicit_string_variable' => true,
        'declare_strict_types'  => true,
        'final_internal_class' => true,
        'header_comment' => ['header' => $header],
        'heredoc_to_nowdoc' => true,
        'list_syntax' => ['syntax' => 'long'],
        'method_chaining_indentation' => true,
        'method_argument_space' => ['ensure_fully_multiline' => true],
        'multiline_comment_opening_closing' => true,
        'no_extra_blank_lines' => ['tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block']],
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_curly_braces' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => false,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'php_unit_strict' => true,
        'php_unit_test_annotation' => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_types_order' => true,
        'semicolon_after_instruction' => true,
        'single_line_comment_style' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'yoda_style' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->notName('LICENSE')
            ->notName('README.md')
            ->notName('phpunit.xml*')
            ->notName('*.phar')
            ->exclude('vendor')
            ->exclude('var')
            ->exclude('config')
            ->exclude('Resources')
            ->exclude('tests/Fixtures')
            ->in(__DIR__)
    )
    ->setUsingCache(true)
;

return $config;
