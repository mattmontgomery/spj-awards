<?php

namespace UtahSpj\AwardsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EntryControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/entry/view');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/entry/edit');
    }

}
