<?php

namespace PG\ShortUrlBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of ShortUrlControllerTest
 *
 * @author Gianni Prosperi
 */
class ShortUrlControllerTest extends WebTestCase {
    
    public function testUnexistentUrl() {
         $client = static::createClient();
         
         $crawler = $client->request('GET', '/unexistenturl');
         
         $this->assertEquals(200, $client->getResponse()->getStatusCode());     
         $this->assertContains('url not found', $crawler->filter('h1.url-not-found')->text());
    }
    
    public function testExistentUrl() {
         $client = static::createClient();
         
         $client->request('GET', '/J213');
         
         $this->assertEquals(301, $client->getResponse()->getStatusCode());
    }
}
