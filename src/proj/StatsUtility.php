<?php

namespace App\proj;

use DateTime;
use Traversable;
use App\Entity\Wildfires;
use App\Entity\GlobalWhether;
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
        $entityManager->persist($this->getWhether(2012, 0.61, 67774));
        $entityManager->persist($this->getWhether(2013, 0.68, 47579));
        $entityManager->persist($this->getWhether(2014, 0.71, 63312));
        $entityManager->persist($this->getWhether(2015, 0.80, 68151));
        $entityManager->persist($this->getWhether(2016, 1.04, 67743));
        $entityManager->persist($this->getWhether(2017, 0.96, 71499));
        $entityManager->persist($this->getWhether(2018, 0.88, 58083));  
        $entityManager->persist($this->getWhether(2019, 0.92, 50477));
        $entityManager->persist($this->getWhether(2020, 1.04, 58950));
        $entityManager->persist($this->getWhether(2021, 0.90, 58985));
        $entityManager->persist($this->getWhether(2022, 0.92, 68988));
        $entityManager->persist($this->getWhether(2023, 0.93, 56580));
        $entityManager->persist($this->getWhether(2024, 1.29, 64897));
        $entityManager->flush();
    }

    public function getData(ManagerRegistry $doctrine)
    {
        $repository  =  $doctrine->getManager()->getRepository(GlobalWhether::class);
        $wetherdata = $repository->findAll();

      
        $data = [];
        foreach ($wetherdata as  $wetherdat) {
            $year = $wetherdat->getDate();
            $temp = $wetherdat->getTemperature();
            $wildfires  = $wetherdat->getWildfires();
            $wildfires->initialize();
            $wild = 0;
            foreach ($wildfires as $wildfire) {
                $wild += $wildfire->getAmount();
            }

            $data[] = [
                'year' => $year->format('y'),
                'temp' => $temp * 100,
                'temp_n' => $temp ,
                'wildfires' => $wild ,
                'wildfires_n' => $wild/1000
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
