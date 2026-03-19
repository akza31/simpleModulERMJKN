<?php
function Practitioner(
    $id_pr,
    $sip,
    $nik_pr,
    $nama_pr,
    $phone,
    $email,
    $address,
    $city,
    $district,
    $state,
    $postalCode,
    $gender,
    $birthDate
){
    return [
        
            "resourceType" => "Practitioner",
            "id" => $id_pr,
            "identifier" => [
                [
                    "use" => "official",
                    "system" => "urn:oid:nomor_sip",
                    "value" => $sip
                ],
                [
                    "use" => "official",
                    "type" => [
                        "coding" => [
                            [
                                "system" => "http://hl7.org/fhir/v2/0203",
                                "code" => "NNIDN"
                            ]
                        ]
                    ],
                    "value" => $nik_pr,
                    "assigner" => [
                        "display" => "KEMDAGRI"
                    ]
                ]
            ],
            "name" => [
                [
                    "use" => "official",
                    "text" => $nama_pr
                ]
            ],
            "telecom" => [
                [
                    "system" => "phone",
                    "value" => $phone,
                    "use" => "work"
                ],
                [
                    "system" => "email",
                    "value" => $email,
                    "use" => "work"
                ]
            ],
            "address" => [
                [
                    "use" => "home",
                    "text" => $address,
                    "line" => [$address],
                    "city" => $city,
                    "district" => $district,
                    "state" => $state,
                    "postalCode" => $postalCode,
                    "country" => "IDN"
                ]
            ],
            "gender" => $gender,
            "birthDate" => $birthDate
        
    ];
}
?>