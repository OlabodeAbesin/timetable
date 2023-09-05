<?php

namespace App\Services;

use App\Models\JourneyPatternSection;
use App\Models\JourneyPatternTimingLink;

class JourneyService
{
    public function createJourneyPatternSections($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->JourneyPatternSections->JourneyPatternSection as $journeyPatternSectionData) {
            $jps = JourneyPatternSection::firstOrCreate([
                'id' => (string) $journeyPatternSectionData->attributes()['id'],
            ]);

            // Process JourneyPatternTimingLinks within JourneyPatternSection
            foreach ($journeyPatternSectionData->JourneyPatternTimingLink as $journeyPatternTimingLinkData) {
                JourneyPatternTimingLink::updateOrCreate(
                    [
                        'route_link_ref' => (string) $journeyPatternTimingLinkData->RouteLinkRef,
                        'journey_pattern_section_id' => $journeyPatternSectionData->attributes()['id'],
                    ],
                    [
                        'from_sequence_number' => (int) $journeyPatternTimingLinkData->From->attributes()['SequenceNumber'],
                        'from_activity' => (string) $journeyPatternTimingLinkData->From->Activity,
                        'from_dynamic_destination_display' => (string) $journeyPatternTimingLinkData->From->DynamicDestinationDisplay,
                        'from_stop_point_ref' => (string) $journeyPatternTimingLinkData->From->StopPointRef,
                        'from_timing_status' => (string) $journeyPatternTimingLinkData->From->TimingStatus,
                        'to_sequence_number' => (int) $journeyPatternTimingLinkData->To->attributes()['SequenceNumber'],
                        'to_activity' => (string) $journeyPatternTimingLinkData->To->Activity,
                        'to_dynamic_destination_display' => (string) $journeyPatternTimingLinkData->To->DynamicDestinationDisplay,
                        'to_stop_point_ref' => (string) $journeyPatternTimingLinkData->To->StopPointRef,
                        'to_timing_status' => (string) $journeyPatternTimingLinkData->To->TimingStatus,
                        'run_time' => (string) $journeyPatternTimingLinkData->RunTime,
                    ]
                );
            }
        }
    }
}
