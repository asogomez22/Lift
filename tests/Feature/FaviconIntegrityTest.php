<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaviconIntegrityTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_homepage_uses_the_canonical_favicon_markup(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee(asset('favicon.ico'), false);
        $response->assertSee(asset('favicon.svg'), false);
    }

    public function test_the_locked_favicon_assets_keep_the_expected_hashes(): void
    {
        $expectedIcoHash = 'c5ee5c07a04cdc0665c008bfc78ad59f26b492dee8f6da174661bfe6c74be7d7';
        $expectedSvgHash = '803e46c19d2ce000955636c7eaaf62884e79973592e9ca005997601163099475';

        $this->assertSame($expectedIcoHash, hash_file('sha256', public_path('favicon.ico')));
        $this->assertSame($expectedSvgHash, hash_file('sha256', public_path('favicon.svg')));
        $this->assertSame($expectedIcoHash, hash_file('sha256', resource_path('public/favicon.ico')));
        $this->assertSame($expectedSvgHash, hash_file('sha256', resource_path('public/favicon.svg')));
    }
}
