<?php
function Conditions($orgId, $noMr, $diagnosa, $start)
{
    $entries = [];
    $conditionRefs = [];

    foreach ($diagnosa as $i => $diag) {

        $conditionId = $orgId . "-" . uniqid();

        $entries[] = [
            "resource" => [
                "resourceType" => "Condition",
                "id" => $conditionId,
                "clinicalStatus" => "active",
                "verificationStatus" => "confirmed",
                "category" => [
                    [
                        "coding" => [
                            [
                                "system" => "http://hl7.org/fhir/condition-category",
                                "code" => "encounter-diagnosis",
                                "display" => "Encounter Diagnosis"
                            ]
                        ]
                    ]
                ],
                "code" => [
                    "text" => $diag["display"],
                    "coding" => [
                        [
                            "system" => "http://snomed.info/sct",
                            "code" => $diag["code"],
                            "display" => $diag["display"]
                        ]
                    ]
                ],
                "subject" => [
                    "reference" => "Patient/".$noMr
                ],
                "onsetDateTime" => $start
            ]
        ];

        $conditionRefs[] = [
            "condition" => [
                "reference" => "Condition/".$conditionId
            ],
            "rank" => $i + 1
        ];
    }

    return [
        "conditions" => $entries,
        "references" => $conditionRefs
    ];
}
?>