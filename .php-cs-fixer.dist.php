<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
;

return (new \PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->registerCustomFixers(new PedroTroller\CS\Fixer\Fixers())
    ->setRules([
        'PedroTroller/exceptions_punctuation' => true,
        'PedroTroller/forbidden_functions' => ['functions' => ['var_dump', 'var_export', 'dump', 'die', 'dd']],
        'PedroTroller/line_break_between_statements' => true,
        'PedroTroller/useless_code_after_return' => true,
        'PedroTroller/doctrine_migrations' => true,
        '@PhpCsFixer' => true,
        '@DoctrineAnnotation' => true,
        '@PHP74Migration' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'cast_spaces' => ['space' => 'none'],
        'concat_space' => ['spacing' => 'one'],
        'escape_implicit_backslashes' => false,
        'explicit_indirect_variable' => false,
        'no_superfluous_elseif' => false,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'constant_public', 'constant_protected', 'constant_private',
                'case',
                'property_public_static', 'property_public_readonly', 'property_public',
                'property_protected_static', 'property_protected_readonly', 'property_protected',
                'property_private_static', 'property_private_readonly', 'property_private',
                'construct', 'destruct', 'magic', 'phpunit',
                'method_public_abstract', 'method_public_abstract_static', 'method_public_static', 'method_public',
                'method_protected_abstract', 'method_protected_abstract_static', 'method_protected_static', 'method_protected',
                'method_private_abstract', 'method_private_abstract_static', 'method_private_static', 'method_private'
            ], 'sort_algorithm' => 'alpha'
        ],
        'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],
        'php_unit_internal_class' => false,
        'native_constant_invocation' => false,
        'native_function_invocation' => false,
        'general_phpdoc_annotation_remove' => ['annotations' => ['author', 'package']],
        'global_namespace_import' => true,
        'linebreak_after_opening_tag' => true,
        'no_php4_constructor' => true,
        'pow_to_exponentiation' => true,
    ])
    ->setFinder($finder)
    ;
