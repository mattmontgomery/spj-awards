<?php

namespace UtahSpj\AwardsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testUsers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/users');
    }

}
