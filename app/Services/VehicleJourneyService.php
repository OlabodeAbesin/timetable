<?php

namespace App\Services;

use App\Models\VehicleJourney;

class VehicleJourneyService
{
    public function createVehicleJourney($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->VehicleJourneys->VehicleJourney as $vehicleJourneyData) {
            $bank_holiday_operation = optional($vehicleJourneyData->OperatingProfile->BankHolidayOperation)->DaysOfNonOperation;
            VehicleJourney::updateOrCreate(
                [
                    'private_code' => (string) $vehicleJourneyData->PrivateCode,
                    'journey_pattern_ref' => (string) $vehicleJourneyData->JourneyPatternRef,
                ],
                [
                    'block_description' => (string) $vehicleJourneyData->Operational->Block->Description,
                    'block_number' => (string) $vehicleJourneyData->Operational->Block->BlockNumber,
                    'ticket_machine_service_code' => (string) $vehicleJourneyData->Operational->TicketMachine->TicketMachineServiceCode,
                    'journey_code' => (string) $vehicleJourneyData->Operational->TicketMachine->JourneyCode,
                    'bank_holiday_operation' => (string) (optional($bank_holiday_operation)->children()) ? optional($bank_holiday_operation->children())->getName() : null,
                    'layover_point_name' => (string) $vehicleJourneyData->LayoverPoint->Name,
                    'layover_point_longitude' => (float) optional($vehicleJourneyData->LayoverPoint->Location)->Longitude,
                    'layover_point_latitude' => (float) optional($vehicleJourneyData->LayoverPoint->Location)->Latitude,
                    'garage_code' => (string) $vehicleJourneyData->GarageRef,
                    'service_code' => (string) $vehicleJourneyData->ServiceRef,
                    'line_code' => (string) $vehicleJourneyData->LineRef,

                    'departure_time' => (string) $vehicleJourneyData->DepartureTime,
                ]
            );
        }
    }
}
