<?php
function observation($lab){

return [
"resourceType"=>"Observation",
"status"=>"final",
"code"=>[
"coding"=>[
[
"system"=>"http://loinc.org",
"code"=>$lab['loinc'],
"display"=>$lab['pemeriksaan']
]
]
],
"valueQuantity"=>[
"value"=>$lab['hasil'],
"unit"=>$lab['satuan']
]
];

}
?>