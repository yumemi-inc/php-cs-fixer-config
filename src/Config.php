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
            // 標準プリセット（下にあるほうが優先度が高い）
            '@Symfony' => true,
            '@PhpCsFixer' => true,
            '@PHP81Migration' => true,
            '@PSR12' => true,

            // 以下でカスタムをアルファベット順に示す
            // プリセットを上書きしているものは [ ] で明示

            // [@PhpCsFixer][@Symfony]
            // ステートメントの上に 1 空白行が必要 (yield は対象外とする)
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
            // 文字列連結の前後にスペースを入れる
            'concat_space' => ['spacing' => 'one'],

            // "}" と "else" の間に改行を認めない
            'control_structure_continuation_position' => true,

            // declare(strict_types=1); のフォーマッティング
            'declare_parentheses' => true,

            // @author など意味のないアノテーションは消す
            'general_phpdoc_annotation_remove' => true,

            // グローバルにあるものを use させて使う
            // - クラス → use させる
            // - 定数 → use させない
            // - 関数 → use させない
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => false,
                'import_functions' => false,
            ],

            // [@PHP80Migration]
            // ヒアドキュメントのインデントは自由にする（複数行引数で使ったときに start_plus_one だと見にくい）
            'heredoc_indentation' => false,

            // [@PhpCsFixer]
            // セミコロンを置く場所
            // メソッドチェインしたときは最後の呼び出し行に置き，改行しない
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],

            // string $var = null を ?string $var = null にする
            'nullable_type_declaration_for_default_null_value' => true,

            // [@PhpCsFixer]
            // PHPUnit TestCase に @internal を付与しなくてもよい
            'php_unit_internal_class' => false,

            // [@PhpCsFixer]
            // PHPUnit TestCase のメソッドは命名自由
            'php_unit_method_casing' => false,

            // [@PhpCsFixer]
            // @covers* アノテーションのないテストに @coversNothing を付与しない
            'php_unit_test_class_requires_covers' => false,

            // PHPDoc の単一行アノテーションを複数行に変換（インラインは対象外）
            'phpdoc_line_span' => true,

            // [@PhpCsFixer][@Symfony]
            // PHPDoc の各アノテーション種類間の強制的な改行分離を無効化
            'phpdoc_separation' => false,

            // [@PhpCsFixer][@Symfony]
            // クラス・関数コメントが「.」で終わらなくてもいいようにする
            'phpdoc_summary' => false,

            // [@PhpCsFixer][@Symfony]
            // @noinspection が修正されないようにする
            'phpdoc_to_comment' => ['ignored_tags' => ['noinspection']],

            // [@PhpCsFixer][@Symfony]
            // ソートアルゴリズムが実態と合っていないので無効化
            'phpdoc_types_order' => false,

            // if ($cond) { return true; } else { return false; } を許可しない
            'simplified_if_return' => true,

            // 型を明示していない null リターンは void に変換する
            'simplified_null_return' => true,

            // [@Symfony]
            // throw 文の単一行制約を無効化
            'single_line_throw' => false,

            // [@PHP80Migration][@PhpCsFixer][@Symfony]
            // 末尾カンマ付与の徹底
            'trailing_comma_in_multiline' => [
                'elements' => ['arrays', 'arguments', 'parameters'],
            ],

            // [@PhpCsFixer][@Symfony]
            // https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/6102 が解決するまで無効化
            'types_spaces' => false,

            // [@PhpCsFixer][@Symfony]
            // ヨーダ記法を禁止する
            'yoda_style' => [
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false,
            ],
        ];

        $riskyRules = [
            // 標準プリセット（下にあるほうが優先度が高い）
            '@Symfony:risky' => true,
            '@PhpCsFixer:risky' => true,
            '@PHP80Migration:risky' => true,
            '@PHPUnit84Migration:risky' => true,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // (string)$var のようにキャストの間は詰める
            'cast_spaces' => ['space' => 'none'],

            // new DateTime を禁止して new DateTimeImmutable を強制
            'date_time_immutable' => true,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // <?= を優先使用
            'echo_tag_syntax' => ['format' => 'short'],

            // [@PhpCsFixer:risky]
            // @internal がついたクラスに final を強制しない
            'final_internal_class' => false,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // ネイティブの定数と関数の前に \ を付与しない
            'native_constant_invocation' => false,
            'native_function_invocation' => false,

            // [@PhpCsFixer:risky]
            // assertEquals() など曖昧な比較のアサーションの使用を許可する（DateTimeInterface の比較用）
            'php_unit_strict' => false,

            // [@PhpCsFixer:risky][@Symfony:risky]
            // @test アノテーションを消して test プレフィクスをつける改変を無効にする
            'php_unit_test_annotation' => false,

            // [@PhpCsFixer:risky]
            // assertSame() などを $this-> 形式のコールに統一する
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],

            // call_user_func*() の使用を禁止する
            'regular_callable_call' => true,

            // [@PHP80Migration:risky]
            // アロー関数を矯正しない（読みにくくなることがあるため）
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
