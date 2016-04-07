<?php
/**
 * @description Import Rubicon-Casa Database
 *
 * @version $Id$
 * @copyright 2007, DCT, Benjamin Gasse
 */

  include_once("./inc/header.php");
  include_once("./inc/settings.php");
  include_once("./inc/functions.php");

  $ScriptnameImport = "import.php";

  write_log($ScriptnameImport, "STARTSTOP", "Starte Import.");

  $GotError = False;

  $DBConnection = @mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD);

  if ($DBConnection) {
    write_log($ScriptnameImport, "INFORMATION", "Verbindung zum Server " . MYSQL_SERVER . " hergestellt.");

    mysql_set_charset('latin1', $DBConnection);

    $DBSelection = @mysql_select_db(MYSQL_DATABASE);

    if ($DBSelection) {
      write_log($ScriptnameImport, "INFORMATION", "Datenbank " . MYSQL_DATABASE . " ausgewählt.");
    } else {
      write_log($ScriptnameImport, "ERROR", "Datenbank " . MYSQL_DATABASE . " konnte nicht ausgewählt werden!");
      $GotError = True;
    };

    $DirHandle = opendir(SCRIPT_DIRECTORY);

    $TxtFiles = array();
    $SqlFiles = array();

    while($file = readdir($DirHandle)){
      if($file != '.' && $file != '..')
        switch(strtolower(substr($file, -3))) {
          case 'txt': array_push($TxtFiles, $file);
                      write_log($ScriptnameImport, "INFORMATION", "Textdatei $file gefunden.");
                      break;
          case 'sql': array_push($SqlFiles, $file);
                      write_log($ScriptnameImport, "INFORMATION", "Skriptdatei $file gefunden.");
                      break;
        };
    };

    closedir($DirHandle);

    sort($TxtFiles);
    sort($SqlFiles);

    foreach($TxtFiles as $TxtFile) {
      if (filesize(SCRIPT_DIRECTORY . "/$TxtFile") == 0) {
        array_splice($TxtFiles, array_search($TxtFile, $TxtFiles), 1);
        write_log($ScriptnameImport, "WARNING", "Textdatei $TxtFile ist leer!");
      } else {
        $FileContent = file(SCRIPT_DIRECTORY . "/$TxtFile");

        $TxtFileError = False;

        foreach($FileContent as $Line) {
          if (!$TxtFileError) {
            $SkriptFile = Trim($Line);

            if (in_array($SkriptFile, $SqlFiles)) {
              if (filesize(SCRIPT_DIRECTORY . "/$SkriptFile") == 0) {
                array_splice($TxtFiles, array_search($TxtFile, $TxtFiles), 1);
                write_log($ScriptnameImport, "WARNING", "Skriptdatei $SkriptFile ist leer!");
                write_log($ScriptnameImport, "INFORMATION", "Textdatei $TxtFile wird nicht bearbeitet.");
                $TxtFileError = True;
              };
            } else {
              array_splice($TxtFiles, array_search($TxtFile, $TxtFiles), 1);
              write_log($ScriptnameImport, "WARNING", "Skriptdatei $SkriptFile nicht gefunden!");
              write_log($ScriptnameImport, "INFORMATION", "Textdatei $TxtFile wird nicht bearbeitet!");
              $TxtFileError = True;
            };
          };
        };
      };
    };

    foreach($TxtFiles as $TxtFile) {
      write_log($ScriptnameImport, "INFORMATION", "Bearbeite Textdatei $TxtFile.");

      $FileContent = file(SCRIPT_DIRECTORY . "/$TxtFile");

      $SkriptFileError = False;

      foreach($FileContent as $Line) {
        if (!$SkriptFileError) {
          $SkriptFile = Trim($Line);

          write_log($ScriptnameImport, "INFORMATION", "Bearbeite Skriptdatei $SkriptFile.");

          $ScriptContent = file(SCRIPT_DIRECTORY . "/$SkriptFile");

          $SQLStatement = implode(" ", $ScriptContent);

          $QueryResult = mysql_query_time($ScriptnameImport, $SQLStatement);
          $RowCount = mysql_affected_rows();

          if (!$QueryResult) {
            write_log($ScriptnameImport, "ERROR", "Es gab folgenden Fehler bei Ausführung des Skriptes $SkriptFile: " . mysql_error());
            $SkriptFileError = True;
            $GotError = True;
          } else {
            write_log($ScriptnameImport, "INFORMATION", "Skriptdatei $SkriptFile erfolgreich ausgeführt. ($RowCount bearbeitete Zeilen)");
          };
        };
      };

      list($FileDate, $FileTime, $ScriptType, $ObjectID) = explode("_",  substr($TxtFile, 0, strpos($TxtFile, '.')));

      if (in_array($ScriptType, array("objekt", "objektdelete"))) {
        if (!$SkriptFileError) {
          $GobInsertSelect = "
            INSERT INTO GeaenderteObjekte (
              GOB_FKID_OBJ_ID,
              GOB_DATUM
            ) VALUES (
              $ObjectID,
              NOW()
            );
          ";

          $GobInsertResult = mysql_query_time($ScriptnameImport, $GobInsertSelect);

          if ($GobInsertResult) {
            write_log($ScriptnameImport, "INFORMATION", "Objekt mit der ID $ObjectID in GeaenderteObjekte eingefügt.");
          } else {
            write_log($ScriptnameImport, "ERROR", "Es gab folgenden Fehler beim Einfügen des Objektes in GeaenderteObjekte mit der ID $ObjectID: " . mysql_error());
            $SkriptFileError = True;
          };
        };

        if (!$SkriptFileError) {
          // Schreibe Objektlogdatei
          $ObjectLog = fopen(OBJECT_LOGS . "/$ObjectID.log", 'w');
          fwrite($ObjectLog, "$ScriptType OK " . date(TIMEFORMAT));
          fclose($ObjectLog);
        } else {
          $ObjectLog = fopen(OBJECT_LOGS . "/$ObjectID.log", 'w');
          fwrite($ObjectLog, "$ScriptType ERROR " . date(TIMEFORMAT));
          fclose($ObjectLog);
        }
      }

      if (!$SkriptFileError) {
        // Verschiebe die Skriptdateien
        $CopyError = False;

        foreach($FileContent as $Line) {
          if (!$CopyError) {
            $SkriptFile = Trim($Line);

            if (!@copy(SCRIPT_DIRECTORY . "/$SkriptFile", SCRIPTS_PROCESSED . "/$SkriptFile")) {
              $CopyError = True;
              $GotError = True;
              write_log($ScriptnameImport, "ERROR", "Skriptdatei $SkriptFile konnte nicht kopiert werden!");
            } else {
              write_log($ScriptnameImport, "INFORMATION", "Skriptdatei $SkriptFile erfolgreich kopiert.");
            };
          };
        };

        if (!$CopyError) {
          if (!@copy(SCRIPT_DIRECTORY . "/$TxtFile", SCRIPTS_PROCESSED . "/$TxtFile")) {
            $CopyError = True;
            $GotError = True;
            write_log($ScriptnameImport, "ERROR", "Textdatei $TxtFile konnte nicht kopiert werden!");
          } else {
            write_log($ScriptnameImport, "INFORMATION", "Textdatei $TxtFile erfolgreich kopiert.");
          };
        };

        if (!$CopyError) {
          write_log($ScriptnameImport, "INFORMATION", "Dateien erfolgreich kopiert. Lösche die Ursprungsdateien.");

          foreach($FileContent as $Line) {
            $SkriptFile = Trim($Line);

            if (@unlink(SCRIPT_DIRECTORY . "/$SkriptFile")) {
              write_log($ScriptnameImport, "INFORMATION", "Skriptdatei $SkriptFile erfolgreich gelöscht.");
            } else {
              write_log($ScriptnameImport, "WARNING", "Skriptdatei $SkriptFile konnte nicht gelöscht werden.");
            };
          };

          if (@unlink(SCRIPT_DIRECTORY . "/$TxtFile")) {
            write_log($ScriptnameImport, "INFORMATION", "Textdatei $TxtFile erfolgreich gelöscht.");
          } else {
            write_log($ScriptnameImport, "WARNING", "Textdatei $TxtFile konnte nicht gelöscht werden.");
          };
        };
      };
    };

    $DBClose = @mysql_close($DBConnection);

    if ($DBClose) {
      write_log($ScriptnameImport, "INFORMATION", "Verbindung zum Server " . MYSQL_SERVER . " geschlossen.");
    } else {
      write_log($ScriptnameImport, "ERROR", "Verbindung zum Server " . MYSQL_SERVER . " konnte nicht geschlossen werden!");
      $GotError = True;
    };
  } else {
    write_log($ScriptnameImport, "ERROR", "Es konnte keine Verbindung zur Datenbank hergestellt werden!");
    $GotError = True;
  };

  include_once('restructure.php');

  if ($GotError) {
    echo "1\n";
    write_log($ScriptnameImport, "ERROR", "Es ist ein Fehler beim Import aufgetreten!");
  } else {
    write_log($ScriptnameImport, "STARTSTOP", "Der Import wurde erfolgreich durchgeführt.");
    echo "0\n";
  };

  include_once("./inc/footer.php");
?>
