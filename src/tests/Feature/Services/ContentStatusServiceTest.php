<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-19
 * Time: 00:06
 */

namespace WebAppId\Content\Tests\Feature\Services;


use WebAppId\Content\Services\ContentStatusService;
use WebAppId\Content\Tests\TestCase;

class ContentStatusServiceTest extends TestCase
{
    
    private $contentStatusService;
    
    public function getContentStatusService(): ContentStatusService
    {
        if ($this->contentStatusService == null) {
            $this->contentStatusService = $this->getContainer()->make(ContentStatusService::class);
        }
        return $this->contentStatusService;
    }
    
    public function testGetContentStatus(): void
    {
        $resultContentStatuses = $this->getContainer()->call([$this->getContentStatusService(), "getContentStatus"]);
        if (count($resultContentStatuses) > 0) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}