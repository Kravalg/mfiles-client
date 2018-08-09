<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__)
    ->exclude('vendor');

PedroTroller\CS\Fixer\Contrib\SingleCommentCollapsedFixer::setCollapsedComments([
    '@var',
]);

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        'align_double_arrow',
        'align_equals',
        'logical_not_operators_with_spaces',
        'newline_after_open_tag',
        'no_empty_comment',
        'no_useless_return',
        'ordered_use',
        'phpdoc_order',
        'phpspec',
        'single_comment_collapsed',
    ])
    ->addCustomFixer(new PedroTroller\CS\Fixer\Contrib\PhpspecFixer())
    ->addCustomFixer(new PedroTroller\CS\Fixer\Contrib\SingleCommentCollapsedFixer())
    ->finder($finder);