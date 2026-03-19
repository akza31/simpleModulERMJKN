<?php
function Encounter($encounterId, $id2, $nama, $noSep, $start, $end, $conditionId)
{
    return [
        
            "resourceType" => "Encounter",
            "id" => $encounterId,
            "identifier" => [
                [
                    "system" => "http://api.bpjs-kesehatan.go.id:8080/Vclaim-rest/SEP/",
                    "value" => $noSep
                ]
            ],
            "subject" => [
                "reference" => "Patient/" . $id2,
                "display" => $nama,
                "noSep" => $noSep
            ],
            "class" => [
                "system" => "http://hl7.org/fhir/v3/ActCode",
                "code" => "AMB",
                "display" => "ambulatory"
            ],
            "incomingReferral" => [
                [
                    "identifier" => [
                        [
                            "system" => "nomor_rujukan_bpjs",
                            "value" => "-"
                        ],
                        [
                            "system" => "nomor_rujukan_internal_rs",
                            "value" => "-"
                        ]
                    ]
                ]
            ],
                "hospitalization" => [
                "dischargeDisposition" => [
                [
                    "coding" => [
                        [
                            "system" => "http://hl7.org/fhir/discharge-disposition",
                            "code" => "home",
                            "display" => "Home"
                        ]
                    ],
                    "text" => ""
                ]
                ]
            ],
            "period" => [
                "start" => $start,
                "end" => $end
            ],
            "status" => "finished",
            "text" => [
                "status" => "generated",
                "div" => "Admitted to POLI , RSU  between $start and $end"
            ],
            "diagnosis" => [
                [
                    "condition" => [
                        "reference" => "Condition/" . $conditionId,
                        "role" => [
                            "coding" => [
                                [
                                    "system" => "http://hl7.org/fhir/diagnosis-role",
                                    "code" => "DD",
                                    "display" => "Discharge Diagnosis"
                                ]
                            ]
                        ],
                        "rank" => 1
                    ]
                ]
            ],
            "reason" => [
                [
                    "coding" => [
                        [
                            "system" => "http://snomed.info/sct",
                            "code" => "28032008",
                            "display" => "Insulin dependent diabetes mellitus type 1B"
                        ]
                    ],
                    "text" => "Insulin dependent diabetes mellitus type 1B"
                ]
            ]
        
    ];
}
?>