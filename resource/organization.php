<?php

function organization($data){

    return [
        "resourceType" => "Organization",
        "id" => $data['id'],

        "identifier" => [
            [
                "use" => "official",
                "system" => "urn:oid:bpjs",
                "value" => $data['kode_bpjs']
            ],
            [
                "use" => "official",
                "system" => "urn:oid:kemkes",
                "value" => $data['kode_kemkes']
            ]
        ],

        "type" => [
            [
                "coding" => [
                    [
                        "system" => "http://hl7.org/fhir/organization-type",
                        "code" => "prov",
                        "display" => "Healthcare Provider"
                    ]
                ]
            ]
        ],

        "name" => $data['nama'],

        "alias" => [
            $data['nama']
        ],

        "telecom" => [
            [
                "system" => "phone",
                "value" => $data['telp'],
                "use" => "work"
            ]
        ],

        "address" => [
            [
                "use" => "work",
                "text" => $data['alamat'],
                "line" => [$data['alamat']],
                "city" => $data['kota'],
                "state" => $data['provinsi'],
                "postalCode" => $data['kodepos'],
                "country" => "Indonesia"
            ]
        ],

        "contact" => [
            [
                "purpose" => [
                    "coding" => [
                        [
                            "system" => "http://hl7.org/fhir/contactentity-type",
                            "code" => "PATINF",
                            "display" => "Patient Information"
                        ]
                    ]
                ],
                "telecom" => [
                    [
                        "system" => "phone",
                        "value" => $data['telp']
                    ]
                ]
            ]
        ]
    ];

}
?>