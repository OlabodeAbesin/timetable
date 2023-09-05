<?php

namespace App\Services;

use App\Models\Operator;

class OperatorService
{
    public function createOperator($xml): void //Todo::make sure to return info in a future version
    {
        foreach ($xml->Operators->Operator as $operatorData) {
            Operator::updateOrCreate(
                [
                    'operator_id' => (string) $operatorData->attributes()['id'],
                    'national_operator_code' => (string) $operatorData->NationalOperatorCode,
                    'operator_code' => (string) $operatorData->OperatorCode,
                ],
                [
                    'operator_short_name' => (string) $operatorData->OperatorShortName,
                    'operator_name_on_licence' => (string) $operatorData->OperatorNameOnLicence,
                    'trading_name' => (string) $operatorData->TradingName,
                    'licence_number' => (string) $operatorData->LicenceNumber,
                    'licence_classification' => (string) $operatorData->LicenceClassification,
                ]
            );
        }
    }
}
