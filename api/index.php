<?php

require_once "header.php";

include 'db.php';
require 'Slim/Slim.php';


//candidates resource
require_once "resources/candidates/deleteCandidate.php";
require_once "resources/candidates/getCandidatesToCall.php";
require_once "resources/candidates/insertCandidate.php";
require_once "resources/candidates/searchCandidates.php";
require_once "resources/candidates/updateCandidate.php";

//professions resource
require_once "resources/professions/getAllProfessions.php";

//app
require_once "app.php";



?>