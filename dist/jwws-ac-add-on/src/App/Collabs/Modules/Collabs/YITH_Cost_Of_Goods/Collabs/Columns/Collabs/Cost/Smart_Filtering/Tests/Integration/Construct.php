<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Smart_Filtering\Tests\Integration;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Smart_Filtering\Smart_Filtering;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Smart_Filtering\Smart_Filtering
 *
 * @internal
 *
 * @small
 */
final class Construct extends WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Smart_Filtering::class,
            actual: new Smart_Filtering(),
        );
    }
}
