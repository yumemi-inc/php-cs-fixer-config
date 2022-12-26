<?php

declare(strict_types=1);

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig
{
    /**
     * @link https://mlocati.github.io/php-cs-fixer-configurator/#version:3.13
     */
    public function __construct(bool $allowRisky = false)
    {
        parent::__construct();

        $rules = [
            // Standard presets (High to low priority)
            '@Symfony' => true,
            '@PhpCsFixer' => true,
            '@PHP81Migration' => true,
            '@PSR12' => true,

            // Customised rules are listed in alphabetical order.
            // Overwritten ruleset(s) by the rule are indicated implicitly in [ ].

            // [@PhpCsFixer][@Symfony]
            // Requires one blank line upon statements (excepting yield)
            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'exit',
                    'goto',
                    'include',
                    'include_once',
                    'phpdoc',
                    'require',
                    'require_once',
                    'return',
                    'switch',
                    'throw',
                    'try',
                ],
            ],

            // [@PhpCsFixer][@Symfony]
            // Requires one spaces each side of string concatenating operator
            'concat_space' => ['spacing' => 'one'],

            // Restricts blank lines between "}" and "else"
            'control_structure_continuation_position' => true,

            // Requires formatting of declare(strict_types=1);
            'declare_parentheses' => true,

            // Removes unnecessary annotations such as @author
            'general_phpdoc_annotation_remove' => true,

            // Requires importing items in the global namespace
            // - Classes: requires "use"
            // - Constants: restricts "use"
            // - Functions: restricts "use"
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => false,
                'import_functions' => false,
            ],

            // [@PHP80Migration]
            // Does not enforce heredoc indentation (start_plus_one is hard to read with multiline arguments)
            'heredoc_indentation' => false,

            // [@PhpCsFixer]
            // Enforces the place of semicolons
            // Place it after the last call without line feeds on method chains
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],

            // Converts "string $var = null" to "?string $var = null"
            'nullable_type_declaration_for_default_null_value' => true,

            // [@PhpCsFixer]
            // Does not require "@internal" annotations in PHPUnit test cases
            'php_unit_internal_class' => false,

            // [@PhpCsFixer]
            // Does not enforce naming of methods in PHPUnit test cases (This allows using other languages in the names)
            'php_unit_method_casing' => false,

            // [@PhpCsFixer]
            // Does not require "@coversNothing" on the tests without "@covers*" annotations
            'php_unit_test_class_requires_covers' => false,

            // Requires multiline annotations for PHPDoc (excepting inlines)
            'phpdoc_line_span' => true,

            // [@PhpCsFixer][@Symfony]
            // Does not enforce the separation among PHPDoc annotations
            'phpdoc_separation' => false,

            // [@PhpCsFixer][@Symfony]
            // Does not require comments on classes or functions ending with "."
            'phpdoc_summary' => false,

            // [@PhpCsFixer][@Symfony]
            // Does not require using comments instead of PHPDocs for "@noinspection" tag
            'phpdoc_to_comment' => ['ignored_tags' => ['noinspection']],

            // [@PhpCsFixer][@Symfony]
            // Disables sorting PHPDoc tags because the sort algorithm does not match what we want
            'phpdoc_types_order' => false,

            // Restricts "if ($cond) { return true; } else { return false; }"
            'simplified_if_return' => true,

            // Converts null returns without type annotations to void
            'simplified_null_return' => true,

            // [@Symfony]
            // Does not enforce throw statements in a single line
            'single_line_throw' => false,

            // [@PHP80Migration][@PhpCsFixer][@Symfony]
            // Requires trailing commas when multiline
            'trailing_comma_in_multiline' => [
                'elements' => ['arrays', 'arguments', 'parameters'],
            ],

            // [@PhpCsFixer][@Symfony]
            // Restricts the yoda style
            'yoda_style' => [
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false,
            ],
        ];

        $riskyRules = [
            // Standard presets (High to low priority)
            '@Symfony:risky' => true,
            '@PhpCsFixer:risky' => true,
            '@PHP80Migration:risky' => true,
            '@PHPUnit84Migration:risky' => true,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // Restricts spaces between casts and expressions (e.g. "(string)$var")
            'cast_spaces' => ['space' => 'none'],

            // Enforces "new DateTimeImmutable" instead of "new DateTime"
            'date_time_immutable' => true,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // Prioritize "<?=" for echos
            'echo_tag_syntax' => ['format' => 'short'],

            // [@PhpCsFixer:risky]
            // Does not require "final" on "@internal" classes
            'final_internal_class' => false,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // Restricts "\" before native constant and function invocations
            'native_constant_invocation' => false,
            'native_function_invocation' => false,

            // [@PhpCsFixer:risky]
            // Does not restrict ambiguous assertions like "assertEquals()" for comparing DateTimeInterface
            'php_unit_strict' => false,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // Does not enforce "test" prefixes instead of "@test" annotations
            'php_unit_test_annotation' => false,

            // [@PhpCsFixer:risky]
            // Requires `$this->` calls on PHPUnit static methods like `assertSame()`
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],

            // Restricts uses of "call_user_func*()"
            'regular_callable_call' => true,

            // [@PHP80Migration:risky]
            // Does not enforce arrow functions (for readability)
            'use_arrow_functions' => false,
        ];

        if ($allowRisky) {
            $rules = [...$rules, ...$riskyRules];
        }

        $this
            ->setRules([...$rules])
            ->setRiskyAllowed($allowRisky)
        ;
    }
}
