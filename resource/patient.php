<?php
function patient($id2,$noMr,$noKartu,$nik,$nama,$kelamin,$tglLahir,$hp,$alamat){

return [
    "resourceType" => "Patient",
    "id" => $id2,

    "identifier" => [
        [
            "use" => "usual",
            "system" => "http://sys-ids.kemkes.go.id/mr",
            "type" => [
                "coding" => [
                    [
                        "system" => "http://hl7.org/fhir/v2/0203",
                        "code" => "MR"
                    ]
                ]
            ],
            "value" => $noMr,
            "assigner" => [
                "display" => "RSU"
            ]
        ],
        [
            "use" => "official",
            "type" => [
                "coding" => [
                    [
                        "system" => "http://hl7.org/fhir/v2/0203",
                        "code" => "MB"
                    ]
                ]
            ],
            "value" => $noKartu,
            "assigner" => [
                "display" => "BPJS KESEHATAN"
            ]
        ],
        [
            "use" => "official",
            "type" => [
                "coding" => [
                    [
                        "system" => "http://hl7.org/fhir/v2/0203",
                        "code" => "NINDN"
                    ]
                ]
            ],
            "value" => $nik,
            "assigner" => [
                "display" => "KEMENDAGRI"
            ]
        ]
    ],

    "active" => true,

    "name" => [
        [
            "use" => "official",
            "text" => $nama
        ]
    ],
       "maritalStatus" => [
           "coding" => [
                    [
                        "system" => "http://hl7.org/fhir/v2/0203",
                        "code" => "M"
                    ]
                ]
    ],
    "telecom" => [
        [
            "system" => "phone",
            "value" => $hp,
            "use" => "mobile"
        ]
    ],

    "gender" => $kelamin,
    "birthDate" => $tglLahir,
    "deceasedBoolean" => false,

  "address" => [
    [
        "line" => ["xyzhl"],
        "text" => "sd",
        "city" => "rerfs",
        "state" => "sdssd",
        "postalCode" => "sdsdsd",
        "district" => "sdsdsd",
        "country" => "ID",
         "use" => "home",
        "type" => "both"
    ]
],
    "managingOrganization" => [
        "reference" => "Organization/kode-RS",
        "display" => "RS INI SAJA"
    ]
];
}
?>