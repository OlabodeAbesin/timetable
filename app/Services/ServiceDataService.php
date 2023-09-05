<?php

namespace App\Services;

use App\Models\Service;

class ServiceDataService
{
    public function createService($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->Services->Service as $serviceData) {
            Service::updateOrCreate(
                [
                    'service_code' => (string) $serviceData->ServiceCode,
                    'private_code' => (string) $serviceData->PrivateCode,
                ],
                [

                    'start_date' => (string) $serviceData->OperatingPeriod->StartDate,
                    'end_date' => (string) $serviceData->OperatingPeriod->EndDate,
                    'regular_day_type' => (string) $serviceData->OperatingProfile->RegularDayType->DaysOfWeek->children()->getName(),
                    'registered_operator_ref' => (string) $serviceData->RegisteredOperatorRef,
                ]
            );
        }
    }
}
