<?php

use Phiki\Grammar\Grammar;
use Phiki\Phiki;
use Phiki\Theme\Theme;

describe('Phiki', function () {
    it('can be constructed', function () {
        expect(new Phiki)->toBeInstanceOf(Phiki::class);
    });

    it('can generate html from code', function () {
        expect((new Phiki)->codeToHtml(<<<'PHP'
        function add(int|float $a, int|float $b): int|float {
            return $a + $b;
        }
        PHP, 'php', 'github-dark'))->toBeString();
    });

    it('accepts a grammar enum member', function () {
        expect((new Phiki)->codeToTokens('echo $a;', Grammar::Php))->toBeArray();
    });

    it('accepts a theme enum member', function () {
        expect((new Phiki)->codeToHtml('echo $a;', Grammar::Php, Theme::GithubDark))->toBeString();
    });
});
