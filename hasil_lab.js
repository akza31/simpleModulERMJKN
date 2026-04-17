{
        "resource": [
            {
                "resourceType": "DiagnosticReport",
                "id": "kd_faskes-lab-260211-0001",
                "status": "final",
                "subject": {
                    "reference": "Patient/kd_faskes-koderskemkes-1-8782a056-6a7c-4e15-893c-e94bb6128046",
                    "display": "SUTINI",
                    "noSep": "112300000001"
                },
                "category": {
                    "coding": {
                        "system": "http://hl7.org/fhir/v2/0074",
                        "code": "LAB",
                        "display": "Laboratory"
                    },
                    "text": null
                },
                "performer": [
                    {
                        "reference": "Organization/1010-LAB",
                        "display": "LABORATORIUM"
                    }
                ],
                "result": [
                    {
                        "resourceType": "Observation",
                        "id": "L260211001",
                        "status": "final",
                        "text": {
                            "status": "generated",
                            "div": "<div>Pemeriksaan: HAEMOGLOBIN</div>"
                        },
                        "issued": "2026-02-11 10:36:42",
                        "effectiveDateTime": "2026-02-11 10:41:32",
                        "code": {
                            "coding": {
                                "system": "http://loinc.org",
                                "code": "20509-6",
                                "display": "Hemoglobin [Mass/volume] in Blood by calculation"
                            },
                            "text": "Hemoglobin [Mass/volume] in Blood by calculation"
                        },
                        "performer": {
                            "reference": "Practitioner/00000022",
                            "display": "NAMA DOKTER"
                        },
                        "conclusion": "normal",
                        "valueQuantity": {
                            "value": "1 - 10",
                            "comparator": null,
                            "unit": "mg",
                            "system": "",
                            "code": ""
                        },
                        "referenceRange": {
                            "low": {
                                "value": "",
                                "unit": ""
                            },
                            "high": {
                                "value": "",
                                "unit": ""
                            }
                        },
                        "interpretation": {
                            "coding": {
                                "system": "http://hl7.org/fhir/v2/0078",
                                "code": "H",
                                "display": "High"
                            },
                            "text": "H"
                        }
                    }
                ]
            }
        ]
    }
