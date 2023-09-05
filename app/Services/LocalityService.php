<?php

namespace App\Services;

use App\Models\NptgLocality;

class LocalityService
{
    public function createNptgLocality($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->NptgLocalities->AnnotatedNptgLocalityRef as $localityData) {
            NptgLocality::updateOrCreate([
                'nptg_locality_ref' => (string) $localityData->NptgLocalityRef,
                'locality_name' => (string) $localityData->LocalityName,
            ]);
        }
    }
}
