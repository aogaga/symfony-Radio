<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 6/6/18
 * Time: 7:39 AM
 * Project Radio
 */

namespace App\Service;


use App\Entity\Stations;

class RadioService extends BaseService
{

    public function allStations(){
        return $this->entityManager->getRepository(Stations::class)
            ->findAll();
    }


    /**
     * @param Stations $station
     * @return mixed
     */
    public function createNewStation(Stations $station){
        $this->entityManager->persist($station);
        $this->entityManager->flush();
        return $station->getId();

    }

    public function createNewTestStation(Stations $station){
        $category = $this->categoryRepository->findOneBy(['id'=> 1]);
        $station->setCategory($category);
        $this->entityManager->persist($station);
        $this->entityManager->flush();
        return $station->getId();

    }
}