<?php

namespace App\DataFixtures;

use App\Entity\Engine;
use App\Entity\Gear;
use App\Entity\Make;
use App\Entity\Seat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {    
        
        //Engine

        $engineList=['essence','diesel','electrique','hybride'];
        foreach ($engineList as $i){
        $engine = new Engine();
        $engine->setEngineType($i);
        $manager->persist($engine);
        }
        
        //Make

        $makeList=['peugeot','ford','opel','mercedes','hyundai','honda','fiat','mitsubishi'];
        foreach ($makeList as $i){
        $make = new Make();
        $make->setMakeName($i);
        $manager->persist($make);
        }
    
        //Gear

        $gearList=['manuelle','automatique'];
        foreach ($gearList as $i){
        $gear = new Gear();
        $gear->setGearBoxType($i);
        $manager->persist($gear);
        }
    
        //Seat

        $seatList=['2','4','5','7','9'];
        foreach ($seatList as $i){
        $seat = new Seat();
        $seat->setSeats($i);
        $manager->persist($seat);
        }
        
        $manager->flush();
    }


}
