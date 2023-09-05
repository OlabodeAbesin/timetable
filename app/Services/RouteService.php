<?php

namespace App\Services;

use App\Models\Route;
use App\Models\RouteSection;

class RouteService
{
    public function createRoute($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->Routes->Route as $routeData) {
            Route::updateOrCreate(
                [
                    'route_id' => (string) $routeData->attributes()['id'],
                ],
                [

                    'private_code' => (string) $routeData->PrivateCode,
                    'description' => (string) $routeData->Description,
                    'route_section_ref' => (string) $routeData->RouteSectionRef,
                ]
            );
        }
    }

    public function createRouteSection($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->RouteSections->RouteSection as $routeSectionData) {
            RouteSection::updateOrCreate(
                [
                    'section_id' => (string) $routeSectionData->attributes()['id'],
                ],
                [
                    'section_id' => (string) $routeSectionData->attributes()['id'],
                    'route_link_id' => (string) $routeSectionData->RouteLink->attributes()['id'],
                    'from_stop_point_ref' => (string) $routeSectionData->RouteLink->From->StopPointRef,
                    'to_stop_point_ref' => (string) $routeSectionData->RouteLink->To->StopPointRef,
                    'distance' => (float) $routeSectionData->RouteLink->Distance,
                    'direction' => (string) $routeSectionData->RouteLink->Direction,
                    'track' => json_encode($this->extractTrackLocations($routeSectionData->RouteLink->Track)),
                ]
            );
        }
    }

    private function extractTrackLocations($track)
    {
        $locations = [];

        foreach ($track->Mapping->Location as $location) {
            $locations[] = [
                'longitude' => (float) $location->Longitude,
                'latitude' => (float) $location->Latitude,
            ];
        }

        return $locations;
    }
}
