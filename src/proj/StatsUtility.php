<?php

namespace App\proj;

use DateTime;
use Traversable;
use App\Entity\Emissions;
use App\Entity\Wildfires;
use App\Entity\GlobalWhether;
use Doctrine\Persistence\ManagerRegistry;

class StatsUtility
{

    /**
     * <p>
     * Temp stats is from https://www.ncei.noaa.gov/access/monitoring/climate-at-a-glance/global/time-series/globe/tavg/land_ocean/12/4/2010-2025
     * </p>
     * <p>
     * Wildfires is from https://www.nifc.gov/fire-information/statistics/wildfires not perfect source as it not seams to be global. 
     * </p>
     * <p>
     * Per capita CO₂ emissions https://ourworldindata.org/explorers/co2?time=1910..latest&facet=none&country=~OWID_WRL&hideControls=false&Gas+or+Warming=CO%E2%82%82&Accounting=Production-based&Fuel+or+Land+Use+Change=All+fossil+emissions&Count=Per+capita
     * </p>
     */

    public function generateData(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();

        $entityManager->persist($this->getWhether(2010, 0.75, 71971, 4.8));
        $entityManager->persist($this->getWhether(2011, 0.65, 74126, 4.9));
        $entityManager->persist($this->getWhether(2012, 0.61, 67774, 4.9));
        $entityManager->persist($this->getWhether(2013, 0.68, 47579, 4.8));
        $entityManager->persist($this->getWhether(2014, 0.71, 63312, 4.8));
        $entityManager->persist($this->getWhether(2015, 0.80, 68151, 4.7));
        $entityManager->persist($this->getWhether(2016, 1.04, 67743, 4.7));
        $entityManager->persist($this->getWhether(2017, 0.96, 71499, 4.7));
        $entityManager->persist($this->getWhether(2018, 0.88, 58083, 4.8));
        $entityManager->persist($this->getWhether(2019, 0.92, 50477, 4.8));
        $entityManager->persist($this->getWhether(2020, 1.04, 58950, 4.5));
        $entityManager->persist($this->getWhether(2021, 0.90, 58985, 4.7));
        $entityManager->persist($this->getWhether(2022, 0.92, 68988, 4.6));
        $entityManager->persist($this->getWhether(2023, 0.93, 56580, 4.7));
        $entityManager->persist($this->getWhether(2024, 1.29, 64897, -1));
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

            $emissions  = $wetherdat->getEmissions();
            $emissions->initialize();


            $wild = 0;
            foreach ($wildfires as $wildfire) {
                $wild += $wildfire->getAmount();
            }

            $emissionAmount = 0;
            foreach ($emissions as $emission) {
                $emissionAmount += $emission->getAmountEm();
            }


            $data[] = [
                'year' => $year->format('Y'),
                'temp' => $temp * 10,
                'temp_n' => $temp,
                'wildfires' => $wild,
                'wildfires_n' => $wild / 1000,
                'emission' => $emissionAmount <= 0 ? "NaN" : $emissionAmount,
                'emission_n' => $emissionAmount <= 0 ? 0 : $emissionAmount *10
            ];
        }

        return $data;
    }





    private function getWhether(int $year, float  $temp, int $wildfiresAmount, float $emissionAmount): GlobalWhether
    {
        $globalWhether = new GlobalWhether();

        $date = new DateTime();
        $date->setDate($year, 1, 1);

        $wildfires = new Wildfires();
        $wildfires->setDate($date);
        $wildfires->setAmount($wildfiresAmount);

        $emissions  = new Emissions();
        $emissions->setAmountEm($emissionAmount);

        $globalWhether->addEmissions($emissions);
        $globalWhether->addWildfires($wildfires);
        $globalWhether->setTemperature($temp);
        $globalWhether->setDate($date);
        return  $globalWhether;
    }
}
