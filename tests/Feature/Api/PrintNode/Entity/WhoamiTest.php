<?php

declare(strict_types=1);

namespace Rawilk\Printing\Tests\Feature\Api\PrintNode\Entity;

use Rawilk\Printing\Api\PrintNode\Entity\Whoami;
use Rawilk\Printing\Tests\TestCase;

class WhoamiTest extends TestCase
{
    /** @test */
    public function can_be_created_from_array(): void
    {
        $whoami = new Whoami($this->sampleData());

        $this->assertSame(433, $whoami->id);
        $this->assertEquals('Peter', $whoami->firstName);
        $this->assertEquals('Tuthill', $whoami->lastName);
        $this->assertEquals('peter@omlet.co.uk', $whoami->email);
        $this->assertFalse($whoami->canCreateSubAccounts);
        $this->assertSame(10134, $whoami->credits);
        $this->assertSame(3, $whoami->numComputers);
        $this->assertSame(110, $whoami->totalPrints);
        $this->assertIsArray($whoami->tags);
        $this->assertEmpty($whoami->tags);
        $this->assertIsArray($whoami->permissions);
        $this->assertEquals(['Unrestricted'], $whoami->permissions);
        $this->assertEquals('active', $whoami->state);
    }

    /** @test */
    public function casts_to_array(): void
    {
        $data = $this->sampleData();
        $whoami = new Whoami($data);

        $asArray = $whoami->toArray();

        foreach ($data as $key => $value) {
            switch ($key) {
                case 'Tags':
                    $key = 'tags';

                    break;
                case 'firstname':
                    $key = 'firstName';

                    break;
                case 'lastname':
                    $key = 'lastName';

                    break;
            }

            $this->assertArrayHasKey($key, $asArray);
        }
    }

    protected function sampleData(): array
    {
        return json_decode(
            file_get_contents(__DIR__ . '/../../../../stubs/Api/PrintNode/whoami.json'),
            true
        );
    }
}
