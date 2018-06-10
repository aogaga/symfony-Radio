<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 6/3/18
 * Time: 11:30 PM
 * Project Radio
 */

namespace App\Controller;
use App\Entity\Stations;
use App\Service\RadioService;
use Carbon\Carbon;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;


/**
 * Class RadioController
 * @package App\Controller
 * @Rest\Route("/api/v1/radio")
 */
class RadioController extends FOSRestController
{


    private $radioService;

    public function __construct(RadioService $radio){
        $this->radioService = $radio;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/")
     */
    public function allRadioStations(){
        return $this->radioService->allStations();
    }


    /**
     * @param Stations $station
     * @return mixed
     * @Rest\View()
     * @Rest\Post("/")
     */
    public function createNewRadioStation(Stations $station){
        return $this->radioService->createNewStation($station);
    }


    /**
     * @return mixed
     * @Rest\View()
     * @Rest\Post("/testRaddio")
     */
    public function sampleRadio(){

        $station = new Stations();
        $station->setName('ITV Radio');
        $station->setLogo('ITV.jpg');
        $station->setUrl('http://ITV.com/');
        $station->setDescription('bull crap');
        $station->setPhone(617);
        $station->setEmail('aogaga@gmail.com');
        $station->setCity('benin city');
        $station->setWebsite('http://ITV.com');
        $station->setFacebook('facebook.com/ITV');
        $station->setTwitter('twitter.com');
        $station->setCreated(Carbon::now());
        $station->setUpdated(Carbon::now());
        return $this->radioService->createNewTestStation($station);

    }



}