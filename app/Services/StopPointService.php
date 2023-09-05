<?php

namespace App\Services;

use App\Models\StopPoint;

class StopPointService
{
    public function createStopPoint($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->StopPoints->StopPoint as $stopPointData) {
            StopPoint::updateOrCreate(
                ['atco_code' => (string) $stopPointData->AtcoCode],
                [

                    'common_name' => (string) $stopPointData->Descriptor->CommonName,
                    'longitude' => (float) $stopPointData->Place->Location->Longitude,
                    'latitude' => (float) $stopPointData->Place->Location->Latitude,
                    'stop_type' => (string) $stopPointData->StopClassification->StopType,
                    'timing_status' => (string) $stopPointData->StopClassification->OffStreet->BusAndCoach->Bay->TimingStatus,
                    'administrative_area_ref' => (string) $stopPointData->AdministrativeAreaRef,
                    'notes' => (string) $stopPointData->Notes,
                ]
            );
        }
    }
}
