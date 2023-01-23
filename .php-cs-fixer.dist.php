<?php

return (new PhpCsFixer\Config)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,

        // ARRAY NOTATION
        'array_syntax' => [ 'syntax' => 'short' ],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'whitespace_after_comma_in_array' => true,

        // PHPDOC
        'align_multiline_comment' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_phpdoc' => true,
        'phpdoc_add_missing_param_annotation' => true,

        // RETURN NOTATION
        'no_useless_return' => true,
        'return_assignment' => true,
        'simplified_null_return' => true,

        // SEMICOLON
        'multiline_whitespace_before_semicolons' => [ 'strategy' => 'no_multi_line' ],
        'no_empty_statement' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'semicolon_after_instruction' => true,
        'space_after_semicolon' => true,

        // STRICT
        'declare_strict_types' => true,
        'strict_comparison' => true,
        'strict_param' => true,

        // WHITESPACE
        'array_indentation' => true,
    ]);
