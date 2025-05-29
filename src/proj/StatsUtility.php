<?php

namespace App\proj;

use App\Entity\GlobalWhether;
use App\Entity\Wildfires;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;

class StatsUtility
{

    /**
     * 
     * Temp stats is from https://www.ncei.noaa.gov/access/monitoring/climate-at-a-glance/global/time-series/globe/tavg/land_ocean/12/4/2010-2025
     * Wildfires is from https://www.nifc.gov/fire-information/statistics/wildfires not perfect source as it not seams to be global. 
     * 
     */

    public function generateData(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();

        $entityManager->persist($this->getWhether(2010, 0.75, 71971));
        $entityManager->persist($this->getWhether(2011, 0.65, 74126));
        $entityManager->flush();
    }

    public function getData(ManagerRegistry $doctrine)
    {
        $wetherdata = $doctrine->getManager()->getRepository(GlobalWhether::class)->findAll();

        $data = [];
        foreach ($wetherdata as  $wetherdat) {
            $year = $wetherdat->getDate();
            $temp = $wetherdat->getTemperature();
            $wildfires  = $wetherdat->getWildfires();

            $wild = '';
            foreach($wildfires as $wildfire){
                $wild += $wildfire->getAmount();
            }

            $data = [
                'year' => $year,
                'temp' => $temp,
                'wildfires' => $wild 
            ];
        }
        
        return $data;
    }





    private function getWhether(int $year, float  $temp, int $wildfiresAmount): GlobalWhether
    {
        $globalWhether = new GlobalWhether();

        $date = new DateTime();
        $date->setDate($year, 1, 1);

        $wildfires = new Wildfires();
        $wildfires->setDate($date);
        $wildfires->setAmount($wildfiresAmount);

        $globalWhether->setTemperature($temp);
        $globalWhether->addWildfires($wildfires);
        $globalWhether->setDate($date);
        return  $globalWhether;
    }
}
