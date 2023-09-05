<?php

namespace App\Console\Commands;

use App\Services\JourneyService;
use App\Services\LocalityService;
use App\Services\OperatorService;
use App\Services\RouteService;
use App\Services\ServiceDataService;
use App\Services\StopPointService;
use App\Services\VehicleJourneyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SimpleXMLElement;

class ProcessXmlFiles extends Command
{
    public $journeyService;

    public $nptgLocality;

    public $operatorService;

    public $stopPointService;

    public $routeService;

    public $serviceDataService;

    public $vehicleJourneyService;

    public function __construct(
        JourneyService $journeyService,
        LocalityService $nptgLocality,
        OperatorService $operatorService,
        StopPointService $stopPointService,
        RouteService $routeService,
        ServiceDataService $serviceDataService,
        VehicleJourneyService $vehicleJourneyService
    ) {
        parent::__construct();
        $this->journeyService = $journeyService;
        $this->nptgLocality = $nptgLocality;
        $this->operatorService = $operatorService;
        $this->stopPointService = $stopPointService;
        $this->routeService = $routeService;
        $this->serviceDataService = $serviceDataService;
        $this->vehicleJourneyService = $vehicleJourneyService;
    }

    protected $signature = 'app:process-xml';

    protected $description = 'Process XML files in a folder and store data in the database';

    public function handle()
    {
        // Set the folder path to the "xml" folder in the Laravel root directory
        $folder = base_path('xml');

        // Get a list of XML files in the specified folder
        $xmlFiles = File::glob($folder.'/*.xml');

        foreach ($xmlFiles as $xmlFile) {
            $xmlData = file_get_contents($xmlFile);
            $xml = new SimpleXMLElement($xmlData);

            //Process JourneyPatternSections
            $this->journeyService->createJourneyPatternSections($xml);
            $this->comment($xmlFile.' JourneyPatternSections imported');

            // Process NptgLocalities
            $this->nptgLocality->createNptgLocality($xml);
            $this->comment($xmlFile.' NptgLocalities imported');

            // Process Operators
            $this->operatorService->createOperator($xml);
            $this->comment($xmlFile.' Operators imported');

            // Process StopPoints
            $this->stopPointService->createStopPoint($xml);
            $this->comment($xmlFile.' StopPoints imported');

            // Process RouteSections
            $this->routeService->createRouteSection($xml);
            $this->comment($xmlFile.' RouteSections imported');

            // Process Routes
            $this->routeService->createRoute($xml);
            $this->comment($xmlFile.' Routes imported');

            // Process Services
            $this->serviceDataService->createService($xml);
            $this->comment($xmlFile.' Services imported');

            // Process VehicleJourneys
            $this->vehicleJourneyService->createVehicleJourney($xml);
            $this->comment($xmlFile.' VehicleJourneys imported');
        }

        $this->info('XML files processed and data stored in the database.');
    }
}
