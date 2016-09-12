<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookingAppointmentControllerTest extends WebTestCase
{
    public function testBookappointment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/book/appointment');
    }

    public function testUpdateappointment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/update/appointment');
    }

    public function testRemoveappointment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/remove/appointment/{:id}');
    }

}
