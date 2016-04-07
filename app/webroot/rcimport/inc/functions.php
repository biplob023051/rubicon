<?php
/**
 * @description Functions Rubicon-Casa Database
 *
 * @version $Id$
 * @copyright 2007, DCT, Benjamin Gasse
 */

  // Funktion zum Schreiben der Logdatei
  function write_log($Scriptname, $Level, $Text){
    switch(strtoupper($Level)){
      case "DEBUG"      : $LevelID = 0; break;
      case "INFORMATION": $LevelID = 1; break;
      case "WARNING"    : $LevelID = 2; break;
      case "ERROR"      : $LevelID = 3; break;
      case "STARTSTOP"  : $LevelID = 4; break;
      default: $LevelID = 3;
    };

    switch(strtoupper(LOGFILE_LEVEL)){
      case "DEBUG"      : $LevelSetting = 0; break;
      case "INFORMATION": $LevelSetting = 1; break;
      case "WARNING"    : $LevelSetting = 2; break;
      case "ERROR"      : $LevelSetting = 3; break;
      case "STARTSTOP"  : $LecelSetting = 4; break;
      default: $LevelSetting = 1;
    };

    if ($LevelID >= $LevelSetting) {
      $LogFile = fopen(LOGFILE_NAME, 'a');
      fwrite($LogFile, "$Scriptname " . date(TIMEFORMAT) . ": $Level: $Text\n");
      fclose($LogFile);
    };
  };

  // Funktion zum Ausfuerhen von MySQL Queries mit optionaler Zeitausgabe
  function mysql_query_time($Scriptname, $QueryString) {
    list($QueryStartMil, $QueryStartSek) = explode(" ", microtime());
    $QueryResult = mysql_query($QueryString);
    list($QueryEndMil, $QueryEndSek) = explode(" ", microtime());

    $UsedTime = ($QueryEndSek + $QueryEndMil) - ($QueryStartSek + $QueryStartMil);

    write_log($Scriptname, "DEBUG", "Folgendes Query ausgefuehrt:\n$QueryString\n(Benoetigte Zeit: $UsedTime).");

    return $QueryResult;
  };
?>
