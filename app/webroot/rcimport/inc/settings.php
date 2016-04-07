<?php
/**
 * @description Settings Rubicon-Casa Database
 *
 * @version $Id$
 * @copyright 2007, DCT, Benjamin Gasse
 */

  // Datenbankkonfigurationen
  define("MYSQL_SERVER",   "localhost:/tmp/mysql5.sock");
  define("MYSQL_USERNAME", "dbo528613248");
  define("MYSQL_PASSWORD", "ZfmaoeuD2ioLRkXxVAYE");
  define("MYSQL_DATABASE", "db528613248");

  // Verzeichnis- und Logdateikonfigurationen
  define("LOGFILE_NAME",      "./logfiles/rubicon.log");
  define("SCRIPT_DIRECTORY",  "./scripts");
  define("OBJECT_LOGS",       "./logfiles/objects");
  define("SCRIPTS_PROCESSED", "./scripts/processed");

  // Mögliche Werte sind "DEBUG", "INFORMATION", "WARNING", "ERROR"
  define("LOGFILE_LEVEL", "ERROR");

  // Gewünschtes Zeitformat in Logdateien
  define("TIMEFORMAT", "Y-m-d H:i:s");

  // Wert für Premiumobjekte
  define("PREMIUMOBJECTS", 0);
?>
