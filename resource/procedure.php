<?php
function Procedures($orgId,$noMr,$nama,$nama_pr,$id_pr,$start,$end,$procedures)
{
    $items = [];

    foreach ($procedures as $i => $proc) {

        $procedureId = $orgId."-".uniqid()."-".($i+1);

        $items[] = [
            "resourceType" => "Procedure",
            "id" => $procedureId,
            "text" => [
                "status" => "generated",
                "div" => "Generated Narrative with Details"
            ],
            "status" => "completed",
            "subject" => [
                "reference" => "Patient/".$noMr,
                "display" => $nama
            ],
            "context" => [
                "reference" => "Encounter/".$proc['encounter'],
                "display" => $nama." encounter on ".$start
            ],
            "performedPeriod" => [
                "start" => $start,
                "end" => $end
            ],
            "performer" => [
                [
                    "role" => [
                        "coding" => [
                            [
                                "system" => "http://snomed.info/sct",
                                "code" => $proc['snom_pr'],
                                "display" => $proc['snom_dsp']
                            ]
                        ]
                    ],
                    "actor" => [
                        "reference" => "Practitioner/".$id_pr,
                        "display" => $nama_pr
                    ]
                ]
            ],
            "reasonCode" => [
                [
                    "text" => ""
                ]
            ],
            "bodySite" => [
                [
                    "coding" => [
                        [
                            "system" => "http://snomed.info/sct",
                            "code" => "",
                            "display" => ""
                        ]
                    ]
                ]
            ],
            "note" => [
                [
                    "text" => $proc['note']
                ]
            ],
            "code" => [
                "coding" => $proc['coding']
            ]
        ];
    }

    return [
        "resource" => $items
    ];
}
?>