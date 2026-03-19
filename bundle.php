<?php

function entry($resource){
    return [
        "resource" => $resource
    ];
}

function bundle($id,$sep,$entries){

    return [
        "resourceType" => "Bundle",
        "id" => $id,
            "meta" => [
            "lastUpdated" => date("Y-m-d H:i:s")
        ],
       
        "identifier" => [
            "system" => "sep",
            "value"  => $sep
        ],
     "type" => "document",
        "entry" => $entries
    ];

}
?>