<?php
/**
 * @description Restructure Rubicon-Casa Database
 *
 * @version $Id$
 * @copyright 2007, DCT, Benjamin Gasse
 */

  include_once("./inc/settings.php");
  include_once("./inc/functions.php");

  $ScriptnameRestructure = "restructure.php";

  $Starttime = time();

  // Funktion zum Ermitteln der Übersetzungen
  function get_ueb($Uen, $KnownUet) {
    $ScriptnameRestructure = "restructure.php";

    if (!is_array($KnownUet)) {
      $KnownUet = array();
    }

    if (!array_key_exists("'" . $Uen . "'", $KnownUet)) {
      $UetArray = array();

      if (strlen(trim($Uen)) > 0) {
        $UetSelect = "
          SELECT UEB_FKID_SPR_ID,
                 UEB_TEXT
          FROM   Uebersetzungen
          WHERE  UEB_NUMMER = $Uen
        ";

        $UetResult = mysql_query_time($ScriptnameRestructure, $UetSelect);

        if ($UetResult) {
          write_log($ScriptnameRestructure, "INFORMATION", "Texte fuer Uebersetzungsnummer $Uen gefunden.");

          while(list($UebSprID, $UebText) = mysql_fetch_row($UetResult)) {
            $UebText = str_replace("\n", "<br/>", $UebText);
            $UebText = str_replace("'", "''", $UebText);

            array_push($UetArray, "($UebSprID): $UebText");
          }

          $Uet = implode("', CHAR(13, 10), '", $UetArray);

          $KnownUet = array_merge($KnownUet, array("'" . $Uen . "'" => $Uet));
        } else {
          write_log($ScriptnameRestructure, "WARNING", "Keine Texte fuer Uebersetzungsnummer $Uen gefunden.");
        }
      }
    } else {
      $Uet = $KnownUet["'" . $Uen . "'"];
      write_log($ScriptnameRestructure, "INFORMATION", "Texte fuer Uebersetzungsnummer $Uen in bereits ermittelten Uebersetzungen gefunden.");
    }

    return array($Uet, $KnownUet);
  }

  function check_number($Value) {
    if (strlen(trim($Value)) > 0) {
      $Value = $Value;
    } else {
      $Value = "NULL";
    }

    return $Value;
  }

  function check_varchar($Value) {
    if (strlen(trim($Value)) > 0) {
      $Value = str_replace("\n", "<br/>", $Value);
      $Value = str_replace("'", "''", $Value);
    } else {
      $Value = "";
    }

    return $Value;
  }

  function get_next_obj() {
    $NextObjSelect = "
      SELECT OBJ_ID
      FROM   Objekte OBJ
      WHERE  (
           OBJ_ID NOT IN (SELECT DISTINCT OBJ_ID          FROM GesamtObjekt      GEO WHERE GEO.OBJ_ID          = OBJ.OBJ_ID)
        OR OBJ_ID     IN (SELECT DISTINCT GOB_FKID_OBJ_ID FROM GeaenderteObjekte GOB WHERE GOB.GOB_FKID_OBJ_ID = OBJ.OBJ_ID AND (GOB_WORKING IS NULL OR GOB_WORKING <> 1))
      )
      LIMIT  0, 1;
    ";

    $NextObjResult = mysql_query_time($ScriptnameRestructure, $NextObjSelect);

    $ReturnValue = -1;

    if ($NextObjResult) {
      if (list($NextObjID) = mysql_fetch_row($NextObjResult)) {
        $ReturnValue = $NextObjID;
      }
    }

    return $ReturnValue;
  }

  write_log($ScriptnameRestructure, "STARTSTOP", "Starte Restrukturierung.");

  $GotError = False;

  $DBConnection = @mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD);
  mysql_set_charset("utf8");

  if ($DBConnection) {
    write_log($ScriptnameRestructure, "INFORMATION", "Verbindung zum Server " . MYSQL_SERVER . " hergestellt.");

    $DBSelection = @mysql_select_db(MYSQL_DATABASE);

    if ($DBSelection) {
      write_log($ScriptnameRestructure, "INFORMATION", "Datenbank " . MYSQL_DATABASE . " ausgewählt.");
    } else {
      write_log($ScriptnameRestructure, "ERROR", "Datenbank " . MYSQL_DATABASE . " konnte nicht ausgewählt werden!");
      $GotError = True;
    }

    $CurrentObjID = get_next_obj();

    while (($CurrentObjID <> -1) && (!$GotError)) {
      $ObjObeSelect = "
        SELECT OBJ_ID,
               OBJ_FKID_OBA_ID,
               OBJ_NUMMER,
               OBJ_NAME,
               OBJ_UEN_NAME,
               OBJ_UEBERSCHRIFT,
               OBJ_UEN_UEBERSCHRIFT,
               OBJ_WERBETEXT,
               OBJ_UEN_WERBETEXT,
               OBJ_PREIS,
               OBJ_FKID_MIT_ID_ANLAGE,
               OBJ_ANLAGEDATUM,
               OBJ_FKID_MIT_ID_AENDERUNG,
               NOW() AS OBJ_AENDERUNGSDATUM,
               OBJ_FKID_OBJ_ID,
               OBJ_FKID_ADR_ID,
               OBJ_FKID_BER_ID,
               OBJ_FKID_ANS_ID,
               1 AS OBJ_SICHTBAR,
               OBJ_FKID_OBS_ID,
               OBJ_PREIS_BIS,
               OBJ_EXPOSE_SCHRIFTGROESSE_1,
               OBJ_EXPOSE_SCHRIFTGROESSE_2,
               OBJ_PREISZUSATZ,
               OBJ_UEN_PREISZUSATZ,
               OBJ_EXPOSE_ABSTAND_TEXT,
               OBJ_SCHAU_SCHRIFTGROESSE_1,
               OBJ_SCHAU_SCHRIFTGROESSE_2,
               OBJ_SCHAU_ABSTAND_TEXT,
               OBJ_LOKALE_AENDERUNG,
               OBJ_INTERNET_UPLOAD,
               OBJ_INTERNET_VORHANDEN,
               OBJ_OBJEKT_DER_WOCHE,
               OBJ_EXPOSE_ABSTAND_DETAILS,
               OBJ_EXPOSE_ABSTAND_HAFTUNG,
               OBJ_EXPOSE_ABSTAND_DETAILS1,
               OBJ_EXPOSE_ABSTAND_HAFTUNG1,
               OBJ_EXPOSE_ABSTAND_WERBETEXT,
               OBJ_FKID_ANS_ID_KOOPERATION,
               OBE_ID,
               OBE_DATE,
               OBE_VARCHAR,
               OBE_UEN_VARCHAR,
               OBE_INTEGER,
               OBE_NUMBER,
               OBE_ENSUITE,
               OBE_FKID_EIA_ID,
               OBE_FKID_OBJ_ID,
               OBE_EXPOSERELEVANT,
               OBE_INTERNETRELEVANT,
               OBJ_FKID_OIS_ID,
               OBJ_PREIS_EXPOSERELEVANT,
               OBJ_PREIS_BIS_EXPOSERELEVANT,
               OBJ_PREISZUSATZ_EXPOSERELEVANT,
               OBJ_PREIS_INTERNETREL,
               OBJ_PREIS_BIS_INTERNETREL,
               OBJ_PREISZUSATZ_INTERNETREL,
               OBJ_HP_TITEL,
               OBJ_UEN_HP_TITEL,
               OBJ_HP_KEYWORDS,
               OBJ_UEN_HP_KEYWORDS,
               OBJ_HP_BESCHREIBUNG,
               OBJ_UEN_HP_BESCHREIBUNG,
               OBJ_HP_BILD_KEYWORDS,
               OBJ_UEN_HP_BILD_KEYWORDS,
               OBJ_MIETPREIS,
               OBJ_ENERGIEPASSLEVEL
        FROM   Objekte
               LEFT OUTER JOIN Objekteigenschaften ON (obe_fkid_obj_id = obj_id)
        WHERE  OBJ_ID = " . $CurrentObjID . ";
      ";

/*
    $ObjObe[0]  : OBJ_ID,
    $ObjObe[1]  : OBJ_FKID_OBA_ID,
    $ObjObe[2]  : OBJ_NUMMER,
    $ObjObe[3]  : OBJ_NAME,
    $ObjObe[4]  : OBJ_UEN_NAME,
    $ObjObe[5]  : OBJ_UEBERSCHRIFT,
    $ObjObe[6]  : OBJ_UEN_UEBERSCHRIFT,
    $ObjObe[7]  : OBJ_WERBETEXT,
    $ObjObe[8]  : OBJ_UEN_WERBETEXT,
    $ObjObe[9]  : OBJ_PREIS,
    $ObjObe[10] : OBJ_FKID_MIT_ID_ANLAGE,
    $ObjObe[11] : OBJ_ANLAGEDATUM,
    $ObjObe[12] : OBJ_FKID_MIT_ID_AENDERUNG,
    $ObjObe[13] : OBJ_AENDERUNGSDATUM,
    $ObjObe[14] : OBJ_FKID_OBJ_ID,
    $ObjObe[15] : OBJ_FKID_ADR_ID,
    $ObjObe[16] : OBJ_FKID_BER_ID,
    $ObjObe[17] : OBJ_FKID_ANS_ID,
    $ObjObe[18] : OBJ_SICHTBAR,
    $ObjObe[19] : OBJ_FKID_OBS_ID,
    $ObjObe[20] : OBJ_PREIS_BIS,
    $ObjObe[21] : OBJ_EXPOSE_SCHRIFTGROESSE_1,
    $ObjObe[22] : OBJ_EXPOSE_SCHRIFTGROESSE_2,
    $ObjObe[23] : OBJ_PREISZUSATZ,
    $ObjObe[24] : OBJ_UEN_PREISZUSATZ,
    $ObjObe[25] : OBJ_EXPOSE_ABSTAND_TEXT,
    $ObjObe[26] : OBJ_SCHAU_SCHRIFTGROESSE_1,
    $ObjObe[27] : OBJ_SCHAU_SCHRIFTGROESSE_2,
    $ObjObe[28] : OBJ_SCHAU_ABSTAND_TEXT,
    $ObjObe[29] : OBJ_LOKALE_AENDERUNG,
    $ObjObe[30] : OBJ_INTERNET_UPLOAD,
    $ObjObe[31] : OBJ_INTERNET_VORHANDEN,
    $ObjObe[32] : OBJ_OBJEKT_DER_WOCHE,
    $ObjObe[33] : OBJ_EXPOSE_ABSTAND_DETAILS,
    $ObjObe[34] : OBJ_EXPOSE_ABSTAND_HAFTUNG,
    $ObjObe[35] : OBJ_EXPOSE_ABSTAND_DETAILS1,
    $ObjObe[36] : OBJ_EXPOSE_ABSTAND_HAFTUNG1,
    $ObjObe[37] : OBJ_EXPOSE_ABSTAND_WERBETEXT,
    $ObjObe[38] : OBJ_FKID_ANS_ID_KOOPERATION,
    $ObjObe[39] : OBE_ID,
    $ObjObe[40] : OBE_DATE,
    $ObjObe[41] : OBE_VARCHAR,
    $ObjObe[42] : OBE_UEN_VARCHAR,
    $ObjObe[43] : OBE_INTEGER,
    $ObjObe[44] : OBE_NUMBER,
    $ObjObe[45] : OBE_ENSUITE,
    $ObjObe[46] : OBE_FKID_EIA_ID,
    $ObjObe[47] : OBE_FKID_OBJ_ID,
    $ObjObe[48] : OBE_EXPOSERELEVANT,
    $ObjObe[49] : OBE_INTERNETRELEVANT
    $ObjObe[50] : OBJ_FKID_OIS_ID,
    $ObjObe[51] : OBJ_PREIS_EXPOSERELEVANT,
    $ObjObe[52] : OBJ_PREIS_BIS_EXPOSERELEVANT,
    $ObjObe[53] : OBJ_PREISZUSATZ_EXPOSERELEVANT
    $ObjObe[54] : OBJ_PREIS_INTERNETREL,
    $ObjObe[55] : OBJ_PREIS_BIS_INTERNETREL,
    $ObjObe[56] : OBJ_PREISZUSATZ_INTERNETREL
    $ObjObe[57] : OBJ_HP_TITEL,
    $ObjObe[58] : OBJ_UEN_HP_TITEL,
    $ObjObe[59] : OBJ_HP_KEYWORDS,
    $ObjObe[60] : OBJ_UEN_HP_KEYWORDS,
    $ObjObe[61] : OBJ_HP_BESCHREIBUNG,
    $ObjObe[62] : OBJ_UEN_HP_BESCHREIBUNG,
    $ObjObe[63] : OBJ_HP_BILD_KEYWORDS,
    $ObjObe[64] : OBJ_UEN_HP_BILD_KEYWORDS,
    $ObjObe[65] : OBJ_MIETPREIS
    $ObjObe[66] : OBJ_ENERGIEPASSLEVEL
*/

      $GobUpdate = "
        UPDATE GeaenderteObjekte
        SET    GOB_WORKING = 1
        WHERE  GOB_FKID_OBJ_ID = $CurrentObjID;
      ";

      $GobUpdateResult = mysql_query_time($ScriptnameRestructure, $GobUpdate);

      if ($GobUpdateResult) {
        write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID in GeaenderteObjekte aktualisiert.");
      } else {
        write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Aktualisieren des Objektes aus GeaenderteObjekte mit der ID $LastObjID: " . mysql_error());
      }

      $ObjObeResult = mysql_query_time($ScriptnameRestructure, $ObjObeSelect);

      if ($ObjObeResult) {
        $ObjObeRows = mysql_num_rows($ObjObeResult);

        write_log($ScriptnameRestructure, "INFORMATION", "Bearbeite Objekt $CurrentObjID mit $ObjObeRows Objekteigenschaften.");

        $LastObjID = "";

        while($ObjObe = mysql_fetch_row($ObjObeResult)){
          if ($LastObjID != $ObjObe[0]) {
            if (!$ObjError && ($LastObjID <> "")) {
              $GobDelete = "
                DELETE FROM GeaenderteObjekte
                WHERE  GOB_FKID_OBJ_ID = $LastObjID;
              ";

              $GobDeleteResult = mysql_query_time($ScriptnameRestructure, $GobDelete);

              if ($GobDeleteResult) {
                write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID aus GeaenderteObjekte gelöscht.");
              } else {
                write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Löschen des Objektes aus GeaenderteObjekte mit der ID $LastObjID: " . mysql_error());
              }
            }

            $ObjError = False;
            $ObjDelete = False;
            $LastObjID = $ObjObe[0];
          }

//        echo "$ObjObe[0] - $ObjObe[2] - $ObjObe[39]<br>\n";

          write_log($ScriptnameRestructure, "INFORMATION", "Bearbeite Objekt mit der ID $ObjObe[0].");

          $ObjUpdate = "
            UPDATE Objekte
            SET    OBJ_SICHTBAR = 1
            WHERE  OBJ_ID = $CurrentObjID;
          ";

          $ObjUpdateResult = mysql_query_time($ScriptnameRestructure, $ObjUpdate);

          if ($ObjUpdateResult) {
            write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID auf Sichtbar aktualisiert.");
          } else {
            write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Aktualisieren des Objektes mit der ID $LastObjID: " . mysql_error());
          }

          if ((PREMIUMOBJECTS > 0) && ($ObjObe[9] >= PREMIUMOBJECTS)) {
            $ObjObe[1] = 0;

            $ObjUpdate = "
              UPDATE Objekte
              SET    OBJ_FKID_OBA_ID = 0
              WHERE  OBJ_ID = $CurrentObjID;
            ";

            $ObjUpdateResult = mysql_query_time($ScriptnameRestructure, $ObjUpdate);

            if ($ObjUpdateResult) {
              write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID auf Premium Objektart aktualisiert.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Aktualisieren des Objektes mit der ID $LastObjID: " . mysql_error());
            }

            $LooDelete = "
              DELETE FROM Link_obj_oba
              WHERE  LOO_FKID_OBJ_ID = $CurrentObjID;
            ";

            $LooDeleteResult = mysql_query_time($ScriptnameRestructure, $LooDelete);

            if ($LooDeleteResult) {
              write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID aus den weiteren Objektarten geloescht.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Loeschen des Objektes aus den weiteren Objektarten mit der ID $LastObjID: " . mysql_error());
            }
          } else {
            if (PREMIUMOBJECTS == 0) {
              write_log($ScriptnameRestructure, "INFORMATION", "Wert fuer Premiumobjekte nicht gesetzt.");
            } else {
              write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID nicht als Premium Objektart erkannt.");
            }
          }

          $ObaSelect = "
            SELECT OBA_ID,
                   OBA_BESCHREIBUNG,
                   OBA_UEN_BESCHREIBUNG,
                   OBA_SORTIERUNG,
                   OBA_ANLAGE,
                   OBA_IN_ANLAGE_MOEGLICH,
                   OBA_NUR_IN_ANLAGE,
                   OBA_FKID_OBI_ID,
                   OBA_FUER_MIETOBJEKTE
            FROM   Objektarten
            WHERE  OBA_ID = $ObjObe[1];
          ";

/*
    $Oba[0] : OBA_ID,
    $Oba[1] : OBA_BESCHREIBUNG,
    $Oba[2] : OBA_UEN_BESCHREIBUNG,
    $Oba[3] : OBA_SORTIERUNG,
    $Oba[4] : OBA_ANLAGE,
    $Oba[5] : OBA_IN_ANLAGE_MOEGLICH,
    $Oba[6] : OBA_NUR_IN_ANLAGE,
    $Oba[7] : OBA_FKID_OBI_ID,
    $Oba[8] : OBA_FUER_MIETOBJEKTE
*/

          if (!$ObjError) {
            $ObaResult = mysql_query_time($ScriptnameRestructure, $ObaSelect);

            if ($ObaResult) {
              $Oba = mysql_fetch_row($ObaResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Objektart \"$Oba[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Objektarten: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Oba = "";
          }

          $ObiSelect = "
            SELECT OBI_ID,
                   OBI_BESCHREIBUNG,
                   OBI_UEN_BESCHREIBUNG,
                   OBI_SORTIERUNG,
                   OBI_ANLAGE,
                   OBI_IN_ANLAGE_MOEGLICH,
                   OBI_NUR_IN_ANLAGE
            FROM   Objektarten_internet
            WHERE  OBI_ID = $Oba[7];
          ";

/*
    $Obi[0] : OBI_ID,
    $Obi[1] : OBI_BESCHREIBUNG,
    $Obi[2] : OBI_UEN_BESCHREIBUNG,
    $Obi[3] : OBI_SORTIERUNG,
    $Obi[4] : OBI_ANLAGE,
    $Obi[5] : OBI_IN_ANLAGE_MOEGLICH,
    $Obi[6] : OBI_NUR_IN_ANLAGE,
    $Obi[7] : OBI_FKID_OBI_ID
*/

          if ((strlen(trim($Oba[7])) > 0) && !$ObjError) {
            $ObiResult = mysql_query_time($ScriptnameRestructure, $ObiSelect);

            if ($ObiResult) {
              $Obi = mysql_fetch_row($ObiResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Internetobjektart \"$Obi[1]\" fuer Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Internetobjektarten: " . mysql_error());
              $ObjError = True;
            }
          } else {
            write_log($ScriptnameRestructure, "WARNING", "Internetobjektart konnte fuer Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] nicht ermittelt werden.");
            $Obi = "";
          }

          $BerSelect = "
            SELECT BER_ID,
                   BER_NAME,
                   BER_UEN_NAME,
                   BER_FKID_REG_ID,
                   BER_SORTIERUNG,
                   BER_EXPOSERELEVANT
            FROM   Bereiche
            WHERE  BER_ID = $ObjObe[16];
          ";

/*
    $Ber[0] : BER_ID,
    $Ber[1] : BER_NAME,
    $Ber[2] : BER_UEN_NAME,
    $Ber[3] : BER_FKID_REG_ID,
    $Ber[4] : BER_SORTIERUNG,
    $Ber[5] : BER_EXPOSERELEVANT
*/

          if ((strlen(trim($ObjObe[16])) > 0) && !$ObjError) {
            $BerResult = mysql_query_time($ScriptnameRestructure, $BerSelect);

              if ($BerResult) {
                $Ber = mysql_fetch_row($BerResult);
                write_log($ScriptnameRestructure, "INFORMATION", "Bereich \"$Ber[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
              } else {
                write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Bereiche ($ObjObe[16]): " . mysql_error());
                $ObjError = True;
              }
          } else {
            $Ber = "";
          }

          $RegSelect = "
            SELECT REG_ID,
                   REG_NAME,
                   REG_UEN_NAME,
                   REG_SORTIERUNG,
                   REG_EXPOSERELEVANT,
                   REG_ZONE
            FROM   Regionen
            WHERE  REG_ID = $Ber[3];
          ";

/*
    $Reg[0] : REG_ID,
    $Reg[1] : REG_NAME,
    $Reg[2] : REG_UEN_NAME,
    $Reg[3] : REG_SORTIERUNG,
    $Reg[4] : REG_EXPOSERELEVANT,
    $Reg[5] : REG_ZONE
*/

          if ((strlen(trim($Ber[3])) > 0) && !$ObjError) {
            $RegResult = mysql_query_time($ScriptnameRestructure, $RegSelect);

            if ($RegResult && !$ObjError) {
              $Reg = mysql_fetch_row($RegResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Region \"$Reg[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Regionen ($Ber[3]): " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Reg = "";
          }

          $EiaSelect = "
            SELECT EIA_ID,
                   EIA_BESCHREIBUNG,
                   EIA_UEN_BESCHREIBUNG,
                   EIA_SORTIERUNG,
                   EIA_WERTEINGABEMOEGLICH,
                   EIA_MINWERT,
                   EIA_MAXWERT,
                   EIA_FKID_EIT_ID,
                   EIA_FKID_EIG_ID,
                   EIA_NEWSLETTERRELEVANT,
                   EIA_FKID_EIN_ID,
                   EIA_EXPOSERELEVANT,
                   EIA_PLURAL,
                   EIA_UEN_PLURAL,
                   EIA_FORMAT,
                   EIA_EXPOSE_ANZEIGE_GITTER,
                   EIA_EXPOSE_EIG_ANZEIGEN,
                   EIA_EXCELLISTE_SPALTE,
                   EIA_INTERNETRELEVANT
            FROM   Eigenschaftsarten
            WHERE  EIA_ID = $ObjObe[46];
          ";

/*
    $Eia[0]  : EIA_ID,
    $Eia[1]  : EIA_BESCHREIBUNG,
    $Eia[2]  : EIA_UEN_BESCHREIBUNG,
    $Eia[3]  : EIA_SORTIERUNG,
    $Eia[4]  : EIA_WERTEINGABEMOEGLICH,
    $Eia[5]  : EIA_MINWERT,
    $Eia[6]  : EIA_MAXWERT,
    $Eia[7]  : EIA_FKID_EIT_ID,
    $Eia[8]  : EIA_FKID_EIG_ID,
    $Eia[9]  : EIA_NEWSLETTERRELEVANT,
    $Eia[10] : EIA_FKID_EIN_ID,
    $Eia[11] : EIA_EXPOSERELEVANT,
    $Eia[12] : EIA_PLURAL,
    $Eia[13] : EIA_UEN_PLURAL,
    $Eia[14] : EIA_FORMAT,
    $Eia[15] : EIA_EXPOSE_ANZEIGE_GITTER,
    $Eia[16] : EIA_EXPOSE_EIG_ANZEIGEN,
    $Eia[17] : EIA_EXCELLISTE_SPALTE,
    $Eia[18] : EIA_INTERNETRELEVANT
*/

          if ((strlen(trim($ObjObe[46])) > 0) && !$ObjError) {
            $EiaResult = mysql_query_time($ScriptnameRestructure, $EiaSelect);

            if ($EiaResult && !$ObjError) {
              $Eia = mysql_fetch_row($EiaResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Eigenschaftsart \"$Eia[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Eigenschaftsart: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Eia = "";
          }

          $EigSelect = "
            SELECT EIG_ID,
                   EIG_BESCHREIBUNG,
                   EIG_UEN_BESCHREIBUNG,
                   EIG_RAUMFRAME,
                   EIG_SORTIERUNG,
                   EIG_FKID_EIG_ID,
                   EIG_EXPOSERELEVANT,
                   EIG_SCHAUKASTEN,
                   EIG_FKID_EOG_ID
            FROM   Eigenschaftsgruppen
            WHERE  EIG_ID = $Eia[8];
          ";

/*
    $Eig[0] : EIG_ID,
    $Eig[1] : EIG_BESCHREIBUNG,
    $Eig[2] : EIG_UEN_BESCHREIBUNG,
    $Eig[3] : EIG_RAUMFRAME,
    $Eig[4] : EIG_SORTIERUNG,
    $Eig[5] : EIG_FKID_EIG_ID,
    $Eig[6] : EIG_EXPOSERELEVANT,
    $Eig[7] : EIG_SCHAUKASTEN,
    $Eig[8] : EIG_FKID_EOG_ID
*/

          if ((strlen(trim($ObjObe[46])) > 0) && !$ObjError) {
            $EigResult = mysql_query_time($ScriptnameRestructure, $EigSelect);

            if ($EigResult && !$ObjError) {
              $Eig = mysql_fetch_row($EigResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Eigenschaftsgruppe \"$Eig[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Eigenschaftsgruppe: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Eig = "";
          }

          $EogSelect = "
            SELECT EOG_ID,
                   EOG_BESCHREIBUNG,
                   EOG_UEN_BESCHREIBUNG,
                   EOG_SORTIERUNG
            FROM   Eigenschaftsobergruppen
            WHERE  EOG_ID = $Eig[8];
          ";

/*
    $Eog[0] : EOG_ID,
    $Eog[1] : EOG_BESCHREIBUNG,
    $Eog[2] : EOG_UEN_BESCHREIBUNG,
    $Eog[3] : EOG_SORTIERUNG,
*/

          if ((strlen(trim($Eig[8])) > 0) && !$ObjError) {
            $EogResult = mysql_query_time($ScriptnameRestructure, $EogSelect);

            if ($EogResult && !$ObjError) {
              $Eog = mysql_fetch_row($EogResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Eigenschaftsobergruppe \"$Eog[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren des Eigenschaftsobergruppe: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Eog = "";
          }

          $EitSelect = "
            SELECT EIT_ID,
                   EIT_BESCHREIBUNG,
                   EIT_UEN_BESCHREIBUNG,
                   EIT_SORTIERUNG
            FROM   Eigenschaftstypen
            WHERE  EIT_ID = $Eia[7];
          ";

/*
    $Eit[0] : EIT_ID,
    $Eit[1] : EIT_BESCHREIBUNG,
    $Eit[2] : EIT_UEN_BESCHREIBUNG,
    $Eit[3] : EIT_SORTIERUNG,
*/

          if ((strlen(trim($Eia[7])) > 0) && !$ObjError) {
            $EitResult = mysql_query_time($ScriptnameRestructure, $EitSelect);

            if ($EitResult && !$ObjError) {
              $Eit = mysql_fetch_row($EitResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Eigenschaftstyp \"$Eit[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren des Eigenschaftstyps: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Eit = "";
          }

          $EinSelect = "
            SELECT EIN_ID,
                   EIN_BESCHREIBUNG,
                   EIN_UEN_BESCHREIBUNG,
                   EIN_SORTIERUNG
            FROM   Einheiten
            WHERE  EIN_ID = $Eia[10];
          ";

/*
    $Ein[0] : EIN_ID,
    $Ein[1] : EIN_BESCHREIBUNG,
    $Ein[2] : EIN_UEN_BESCHREIBUNG,
    $Ein[3] : EIN_SORTIERUNG,
*/

          if ((strlen(trim($Eia[10])) > 0) && !$ObjError) {
            $EinResult = mysql_query_time($ScriptnameRestructure, $EinSelect);

            if ($EinResult && !$ObjError) {
              $Ein = mysql_fetch_row($EinResult);
              write_log($ScriptnameRestructure, "INFORMATION", "Einheit \"$Ein[1]\" für Objekt ID $ObjObe[0] und Objekteigenschaft ID $ObjObe[39] ermittelt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Einheit: " . mysql_error());
              $ObjError = True;
            }
          } else {
            $Ein = "";
          }

          list($ObaUetBeschreibung  , $KnownUet) = get_ueb($Oba[2], $KnownUet);
          list($ObiUetBeschreibung  , $KnownUet) = get_ueb($Obi[2], $KnownUet);
          list($ObjUetName          , $KnownUet) = get_ueb($ObjObe[4], $KnownUet);
          list($ObjUetUeberschrift  , $KnownUet) = get_ueb($ObjObe[6], $KnownUet);
          list($ObjUetWerbetext     , $KnownUet) = get_ueb($ObjObe[8], $KnownUet);
          list($ObjUetPreiszusatz   , $KnownUet) = get_ueb($ObjObe[24], $KnownUet);
          list($ObjUetHPTitel       , $KnownUet) = get_ueb($ObjObe[58], $KnownUet);
          list($ObjUetHPKeywords    , $KnownUet) = get_ueb($ObjObe[60], $KnownUet);
          list($ObjUetHPBeschreibung, $KnownUet) = get_ueb($ObjObe[62], $KnownUet);
          list($ObjUetHPBildKeywords, $KnownUet) = get_ueb($ObjObe[64], $KnownUet);
          list($BerUetName          , $KnownUet) = get_ueb($Ber[2], $KnownUet);
          list($RegUetName          , $KnownUet) = get_ueb($Reg[2], $KnownUet);
          list($EogUetBeschreibung  , $KnownUet) = get_ueb($Eog[2], $KnownUet);
          list($EigUetBeschreibung  , $KnownUet) = get_ueb($Eig[2], $KnownUet);
          list($EiaUetBeschreibung  , $KnownUet) = get_ueb($Eia[2], $KnownUet);
          list($EiaUetPlural        , $KnownUet) = get_ueb($Eia[13], $KnownUet);
          list($EitUetBeschreibung  , $KnownUet) = get_ueb($Eit[2], $KnownUet);
          list($EinUetBeschreibung  , $KnownUet) = get_ueb($Ein[2], $KnownUet);
          list($ObeUetVarchar       , $KnownUet) = get_ueb($ObjObe[42], $KnownUet);

/*
        echo "$ObaUetBeschreibung<br/>\n";
        echo "$ObiUetBeschreibung<br/>\n";
        echo "$ObjUetName<br/>\n";
        echo "$ObjUetUeberschrift<br/>\n";
        echo "$ObjUetWerbetext<br/>\n";
        echo "$ObjUetPreiszusatz<br/>\n";
        echo "$BerUetName<br/>\n";
        echo "$RegUetName<br/>\n";
        echo "$EogUetBeschreibung<br/>\n";
        echo "$EigUetBeschreibung<br/>\n";
        echo "$EiaUetBeschreibung<br/>\n";
        echo "$EiaUetPlural<br/>\n";
        echo "$EitUetBeschreibung<br/>\n";
        echo "$EinUetBeschreibung<br/>\n";
        echo "$ObeUetVarchar<br/>\n";
*/

          // Setzten der Preise fuer Mietimmobilien
          if ($Oba[8] == 1) {
            $ObjPreis = $ObjObe[65];
            $ObjPreisBis = 0;
          } else {
            $ObjPreis = $ObjObe[9];
            $ObjPreisBis = $ObjObe[20];
          }

          $GeoDeleteSelect = "
            DELETE FROM GesamtObjekt
            WHERE  OBJ_ID = $ObjObe[0]
          ";

          if (!$ObjError && !$ObjDelete) {
            $GeoDeleteResult = mysql_query_time($ScriptnameRestructure, $GeoDeleteSelect);

            if ($GeoDeleteResult) {
              write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $ObjObe[0] gelöscht.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Löschen des Objektes mit der ID $ObjObe[0]: " . mysql_error());
              $ObjError = True;
            }

            $ObjDelete = True;
          }

          $GeoInsertSelect = "
            INSERT INTO GesamtObjekt (
              OBA_ID,
              OBA_BESCHREIBUNG,
              OBA_UEN_BESCHREIBUNG,
              OBA_SORTIERUNG,
              OBA_ANLAGE,
              OBA_IN_ANLAGE_MOEGLICH,
              OBA_NUR_IN_ANLAGE,
              OBA_FKID_OBI_ID,

              OBI_ID,
              OBI_BESCHREIBUNG,
              OBI_UEN_BESCHREIBUNG,
              OBI_SORTIERUNG,
              OBI_ANLAGE,
              OBI_IN_ANLAGE_MOEGLICH,
              OBI_NUR_IN_ANLAGE,

              OBJ_ID,
              OBJ_FKID_OBA_ID,
              OBJ_NUMMER,
              OBJ_NAME,
              OBJ_UEN_NAME,
              OBJ_UEBERSCHRIFT,
              OBJ_UEN_UEBERSCHRIFT,
              OBJ_WERBETEXT,
              OBJ_UEN_WERBETEXT,
              OBJ_PREIS,
              OBJ_FKID_MIT_ID_ANLAGE,
              OBJ_ANLAGEDATUM,
              OBJ_FKID_MIT_ID_AENDERUNG,
              OBJ_AENDERUNGSDATUM,
              OBJ_FKID_OBJ_ID,
              OBJ_FKID_ADR_ID,
              OBJ_FKID_BER_ID,
              OBJ_FKID_ANS_ID,
              OBJ_SICHTBAR,
              OBJ_FKID_OBS_ID,
              OBJ_PREIS_BIS,
              OBJ_EXPOSE_SCHRIFTGROESSE_1,
              OBJ_EXPOSE_SCHRIFTGROESSE_2,
              OBJ_PREISZUSATZ,
              OBJ_UEN_PREISZUSATZ,
              OBJ_EXPOSE_ABSTAND_TEXT,
              OBJ_SCHAU_SCHRIFTGROESSE_1,
              OBJ_SCHAU_SCHRIFTGROESSE_2,
              OBJ_SCHAU_ABSTAND_TEXT,
              OBJ_LOKALE_AENDERUNG,
              OBJ_INTERNET_UPLOAD,
              OBJ_INTERNET_VORHANDEN,
              OBJ_OBJEKT_DER_WOCHE,
              OBJ_EXPOSE_ABSTAND_DETAILS,
              OBJ_EXPOSE_ABSTAND_HAFTUNG,
              OBJ_EXPOSE_ABSTAND_DETAILS1,
              OBJ_EXPOSE_ABSTAND_HAFTUNG1,
              OBJ_EXPOSE_ABSTAND_WERBETEXT,
              OBJ_FKID_ANS_ID_KOOPERATION,
              OBJ_FKID_OIS_ID,
              OBJ_PREIS_EXPOSERELEVANT,
              OBJ_PREIS_BIS_EXPOSERELEVANT,
              OBJ_PREISZUSATZ_EXPOSERELEVANT,
              OBJ_PREIS_INTERNETREL,
              OBJ_PREIS_BIS_INTERNETREL,
              OBJ_PREISZUSATZ_INTERNETREL,
              OBJ_HP_TITEL,
              OBJ_UEN_HP_TITEL,
              OBJ_HP_KEYWORDS,
              OBJ_UEN_HP_KEYWORDS,
              OBJ_HP_BESCHREIBUNG,
              OBJ_UEN_HP_BESCHREIBUNG,
              OBJ_HP_BILD_KEYWORDS,
              OBJ_UEN_HP_BILD_KEYWORDS,
              OBJ_ENERGIEPASSLEVEL,

              BER_ID,
              BER_NAME,
              BER_UEN_NAME,
              BER_FKID_REG_ID,
              BER_SORTIERUNG,
              BER_EXPOSERELEVANT,

              REG_ID,
              REG_NAME,
              REG_UEN_NAME,
              REG_SORTIERUNG,
              REG_EXPOSERELEVANT,
              REG_ZONE,

              EOG_ID,
              EOG_BESCHREIBUNG,
              EOG_UEN_BESCHREIBUNG,
              EOG_SORTIERUNG,

              EIG_ID,
              EIG_BESCHREIBUNG,
              EIG_UEN_BESCHREIBUNG,
              EIG_RAUMFRAME,
              EIG_SORTIERUNG,
              EIG_FKID_EIG_ID,
              EIG_EXPOSERELEVANT,
              EIG_SCHAUKASTEN,

              EIA_ID,
              EIA_BESCHREIBUNG,
              EIA_UEN_BESCHREIBUNG,
              EIA_SORTIERUNG,
              EIA_WERTEINGABEMOEGLICH,
              EIA_MINWERT,
              EIA_MAXWERT,
              EIA_FKID_EIT_ID,
              EIA_FKID_EIG_ID,
              EIA_NEWSLETTERRELEVANT,
              EIA_FKID_EIN_ID,
              EIA_EXPOSERELEVANT,
              EIA_PLURAL,
              EIA_UEN_PLURAL,
              EIA_FORMAT,
              EIA_EXPOSE_ANZEIGE_GITTER,
              EIA_EXPOSE_EIG_ANZEIGEN,
              EIA_EXCELLISTE_SPALTE,
              EIA_INTERNETRELEVANT,

              EIT_ID,
              EIT_BESCHREIBUNG,
              EIT_UEN_BESCHREIBUNG,
              EIT_SORTIERUNG,

              EIN_ID,
              EIN_BESCHREIBUNG,
              EIN_UEN_BESCHREIBUNG,
              EIN_SORTIERUNG,

              OBE_ID,
              OBE_DATE,
              OBE_VARCHAR,
              OBE_UEN_VARCHAR,
              OBE_INTEGER,
              OBE_NUMBER,
              OBE_ENSUITE,
              OBE_FKID_EIA_ID,
              OBE_FKID_OBJ_ID,
              OBE_EXPOSERELEVANT,
              OBE_INTERNETRELEVANT,

              OBA_UET_BESCHREIBUNG,
              OBI_UET_BESCHREIBUNG,
              OBJ_UET_NAME,
              OBJ_UET_UEBERSCHRIFT,
              OBJ_UET_WERBETEXT,
              OBJ_UET_PREISZUSATZ,
              OBJ_UET_HP_TITEL,
              OBJ_UET_HP_KEYWORDS,
              OBJ_UET_HP_BESCHREIBUNG,
              OBJ_UET_HP_BILD_KEYWORDS,
              BER_UET_NAME,
              REG_UET_NAME,
              EOG_UET_BESCHREIBUNG,
              EIG_UET_BESCHREIBUNG,
              EIA_UET_BESCHREIBUNG,
              EIA_UET_PLURAL,
              EIT_UET_BESCHREIBUNG,
              EIN_UET_BESCHREIBUNG,
              OBE_UET_VARCHAR
            ) VALUES (
              " . check_number($Oba[0]) . ",   -- OBA_ID,
              '" . check_varchar($Oba[1]) . "', -- OBA_BESCHREIBUNG,
              " . check_number($Oba[2]) . ",   -- OBA_UEN_BESCHREIBUNG,
              " . check_number($Oba[3]) . ",   -- OBA_SORTIERUNG,
              " . check_number($Oba[4]) . ",   -- OBA_ANLAGE,
              " . check_number($Oba[5]) . ",   -- OBA_IN_ANLAGE_MOEGLICH,
              " . check_number($Oba[6]) . ",   -- OBA_NUR_IN_ANLAGE,
              " . check_number($Oba[7]) . ",   -- OBA_FKID_OBI_ID

              " . check_number($Obi[0]) . ",   -- OBI_ID,
              '" . check_varchar($Obi[1]) . "', -- OBI_BESCHREIBUNG,
              " . check_number($Obi[2]) . ",   -- OBI_UEN_BESCHREIBUNG,
              " . check_number($Obi[3]) . ",   -- OBI_SORTIERUNG,
              " . check_number($Obi[4]) . ",   -- OBI_ANLAGE,
              " . check_number($Obi[5]) . ",   -- OBI_IN_ANLAGE_MOEGLICH,
              " . check_number($Obi[6]) . ",   -- OBI_NUR_IN_ANLAGE,

              " . check_number($ObjObe[0]) . ",    -- OBJ_ID,
              " . check_number($ObjObe[1]) . ",    -- OBJ_FKID_OBA_ID,
              '" . check_varchar($ObjObe[2]) . "',  -- OBJ_NUMMER,
              '" . check_varchar($ObjObe[3]) . "',  -- OBJ_NAME,
              " . check_number($ObjObe[4]) . ",    -- OBJ_UEN_NAME,
              '" . check_varchar($ObjObe[5]) . "',  -- OBJ_UEBERSCHRIFT,
              " . check_number($ObjObe[6]) . ",    -- OBJ_UEN_UEBERSCHRIFT,
              '" . check_varchar($ObjObe[7]) . "',  -- OBJ_WERBETEXT,
              " . check_number($ObjObe[8]) . ",    -- OBJ_UEN_WERBETEXT,
              " . check_number($ObjPreis) . ",    -- OBJ_PREIS,
              " . check_number($ObjObe[10]) . ",   -- OBJ_FKID_MIT_ID_ANLAGE,
              '" . check_varchar($ObjObe[11]) . "', -- OBJ_ANLAGEDATUM,
              " . check_number($ObjObe[12]) . ",   -- OBJ_FKID_MIT_ID_AENDERUNG,
              '" . check_varchar($ObjObe[13]) . "', -- OBJ_AENDERUNGSDATUM,
              " . check_number($ObjObe[14]) . ",   -- OBJ_FKID_OBJ_ID,
              " . check_number($ObjObe[15]) . ",   -- OBJ_FKID_ADR_ID,
              " . check_number($ObjObe[16]) . ",   -- OBJ_FKID_BER_ID,
              " . check_number($ObjObe[17]) . ",   -- OBJ_FKID_ANS_ID,
              " . check_number($ObjObe[18]) . ",   -- OBJ_SICHTBAR,
              " . check_number($ObjObe[19]) . ",   -- OBJ_FKID_OBS_ID,
              " . check_number($ObjPreisBis) . ",   -- OBJ_PREIS_BIS,
              " . check_number($ObjObe[21]) . ",   -- OBJ_EXPOSE_SCHRIFTGROESSE_1,
              " . check_number($ObjObe[22]) . ",   -- OBJ_EXPOSE_SCHRIFTGROESSE_2,
              '" . check_varchar($ObjObe[23]) . "', -- OBJ_PREISZUSATZ,
              " . check_number($ObjObe[24]) . ",   -- OBJ_UEN_PREISZUSATZ,
              " . check_number($ObjObe[25]) . ",   -- OBJ_EXPOSE_ABSTAND_TEXT,
              " . check_number($ObjObe[26]) . ",   -- OBJ_SCHAU_SCHRIFTGROESSE_1,
              " . check_number($ObjObe[27]) . ",   -- OBJ_SCHAU_SCHRIFTGROESSE_2,
              " . check_number($ObjObe[28]) . ",   -- OBJ_SCHAU_ABSTAND_TEXT,
              '" . check_varchar($ObjObe[29]) . "', -- OBJ_LOKALE_AENDERUNG,
              '" . check_varchar($ObjObe[30]) . "', -- OBJ_INTERNET_UPLOAD,
              " . check_number($ObjObe[31]) . ",   -- OBJ_INTERNET_VORHANDEN,
              " . check_number($ObjObe[32]) . ",   -- OBJ_OBJEKT_DER_WOCHE,
              " . check_number($ObjObe[33]) . ",   -- OBJ_EXPOSE_ABSTAND_DETAILS,
              " . check_number($ObjObe[34]) . ",   -- OBJ_EXPOSE_ABSTAND_HAFTUNG,
              " . check_number($ObjObe[35]) . ",   -- OBJ_EXPOSE_ABSTAND_DETAILS1,
              " . check_number($ObjObe[36]) . ",   -- OBJ_EXPOSE_ABSTAND_HAFTUNG1,
              " . check_number($ObjObe[37]) . ",   -- OBJ_EXPOSE_ABSTAND_WERBETEXT,
              " . check_number($ObjObe[38]) . ",   -- OBJ_FKID_ANS_ID_KOOPERATION,
              " . check_number($ObjObe[50]) . ",   -- OBJ_FKID_OIS_ID,
              " . check_number($ObjObe[51]) . ",   -- OBJ_PREIS_EXPOSERELEVANT,
              " . check_number($ObjObe[52]) . ",   -- OBJ_PREIS_BIS_EXPOSERELEVANT,
              " . check_number($ObjObe[53]) . ",   -- OBJ_PREISZUSATZ_EXPOSERELEVANT,
              " . check_number($ObjObe[54]) . ",   -- OBJ_PREIS_INTERNETREL,
              " . check_number($ObjObe[55]) . ",   -- OBJ_PREIS_BIS_INTERNETREL,
              " . check_number($ObjObe[56]) . ",   -- OBJ_PREISZUSATZ_INTERNETREL,
              '" . check_varchar($ObjObe[57]) . "', -- OBJ_HP_TITEL,
              " . check_number($ObjObe[58]) . ",   -- OBJ_UEN_HP_TITEL,
              '" . check_varchar($ObjObe[59]) . "', -- OBJ_HP_KEYWORDS,
              " . check_number($ObjObe[60]) . ",   -- OBJ_UEN_HP_KEYWORDS,
              '" . check_varchar($ObjObe[61]) . "', -- OBJ_HP_BESCHREIBUNG,
              " . check_number($ObjObe[62]) . ",   -- OBJ_UEN_HP_BESCHREIBUNG,
              '" . check_varchar($ObjObe[63]) . "', -- OBJ_HP_BILD_KEYWORDS,
              " . check_number($ObjObe[64]) . ",   -- OBJ_UEN_HP_BILD_KEYWORDS,
              " . check_number($ObjObe[66]) . ",   -- OBJ_ENERGIEPASSLEVEL

              " . check_number($Ber[0]) . ",   -- BER_ID,
              '" . check_varchar($Ber[1]) . "', -- BER_NAME,
              " . check_number($Ber[2]) . ",   -- BER_UEN_NAME,
              " . check_number($Ber[3]) . ",   -- BER_FKID_REG_ID,
              " . check_number($Ber[4]) . ",   -- BER_SORTIERUNG,
              " . check_number($Ber[5]) . ",   -- BER_EXPOSERELEVANT

              " . check_number($Reg[0]) . ",   -- REG_ID,
              '" . check_varchar($Reg[1]) . "', -- REG_NAME,
              " . check_number($Reg[2]) . ",   -- REG_UEN_NAME,
              " . check_number($Reg[3]) . ",   -- REG_SORTIERUNG,
              " . check_number($Reg[4]) . ",   -- REG_EXPOSERELEVANT,
              " . check_number($Reg[5]) . ",   -- REG_ZONE

              " . check_number($Eog[0]) . ",   -- EOG_ID,
              '" . check_varchar($Eog[1]) . "', -- EOG_BESCHREIBUNG,
              " . check_number($Eog[2]) . ",   -- EOG_UEN_BESCHREIBUNG,
              " . check_number($Eog[3]) . ",   -- EOG_SORTIERUNG,

              " . check_number($Eig[0]) . ",   -- EIG_ID,
              '" . check_varchar($Eig[1]) . "', -- EIG_BESCHREIBUNG,
              " . check_number($Eig[2]) . ",   -- EIG_UEN_BESCHREIBUNG,
              " . check_number($Eig[3]) . ",   -- EIG_RAUMFRAME,
              " . check_number($Eig[4]) . ",   -- EIG_SORTIERUNG,
              " . check_number($Eig[5]) . ",   -- EIG_FKID_EIG_ID,
              " . check_number($Eig[6]) . ",   -- EIG_EXPOSERELEVANT,
              " . check_number($Eig[7]) . ",   -- EIG_SCHAUKASTEN

              " . check_number($Eia[0]) . ",    -- EIA_ID,
              '" . check_varchar($Eia[1]) . "',  -- EIA_BESCHREIBUNG,
              " . check_number($Eia[2]) . ",    -- EIA_UEN_BESCHREIBUNG,
              " . check_number($Eia[3]) . ",    -- EIA_SORTIERUNG,
              " . check_number($Eia[4]) . ",    -- EIA_WERTEINGABEMOEGLICH,
              " . check_number($Eia[5]) . ",    -- EIA_MINWERT,
              " . check_number($Eia[6]) . ",    -- EIA_MAXWERT,
              " . check_number($Eia[7]) . ",    -- EIA_FKID_EIT_ID,
              " . check_number($Eia[8]) . ",    -- EIA_FKID_EIG_ID,
              " . check_number($Eia[9]) . ",    -- EIA_NEWSLETTERRELEVANT,
              " . check_number($Eia[10]) . ",   -- EIA_FKID_EIN_ID,
              " . check_number($Eia[11]) . ",   -- EIA_EXPOSERELEVANT,
              '" . check_varchar($Eia[12]) . "', -- EIA_PLURAL,
              " . check_number($Eia[13]) . ",   -- EIA_UEN_PLURAL,
              '" . check_varchar($Eia[14]) . "', -- EIA_FORMAT,
              " . check_number($Eia[15]) . ",   -- EIA_EXPOSE_ANZEIGE_GITTER,
              " . check_number($Eia[16]) . ",   -- EIA_EXPOSE_EIG_ANZEIGEN,
              " . check_number($Eia[17]) . ",   -- EIA_EXCELLISTE_SPALTE,
              " . check_number($Eia[18]) . ",   -- EIA_INTERNETRELEVANT

              " . check_number($Eit[0]) . ",   -- EIT_ID,
              '" . check_varchar($Eit[1]) . "', -- EIT_BESCHREIBUNG,
              " . check_number($Eit[2]) . ",   -- EIT_UEN_BESCHREIBUNG,
              " . check_number($Eit[3]) . ",   -- EIT_SORTIERUNG,

              " . check_number($Ein[0]) . ",   -- EIN_ID,
              '" . check_varchar($Ein[1]) . "', -- EIN_BESCHREIBUNG,
              " . check_number($Ein[2]) . ",   -- EIN_UEN_BESCHREIBUNG,
              " . check_number($Ein[3]) . ",   -- EIN_SORTIERUNG,

              " . check_number($ObjObe[39]) . ",   -- OBE_ID,
              '" . check_varchar($ObjObe[40]) . "', -- OBE_DATE,
              '" . check_varchar($ObjObe[41]) . "', -- OBE_VARCHAR,
              " . check_number($ObjObe[42]) . ",   -- OBE_UEN_VARCHAR,
              " . check_number($ObjObe[43]) . ",   -- OBE_INTEGER,
              " . check_number($ObjObe[44]) . ",   -- OBE_NUMBER,
              " . check_number($ObjObe[45]) . ",   -- OBE_ENSUITE,
              " . check_number($ObjObe[46]) . ",   -- OBE_FKID_EIA_ID,
              " . check_number($ObjObe[47]) . ",   -- OBE_FKID_OBJ_ID,
              " . check_number($ObjObe[48]) . ",   -- OBE_EXPOSERELEVANT,
              " . check_number($ObjObe[49]) . ",   -- OBE_INTERNETRELEVANT

              CONCAT('$ObaUetBeschreibung'),
              CONCAT('$ObiUetBeschreibung'),
              CONCAT('$ObjUetName'),
              CONCAT('$ObjUetUeberschrift'),
              CONCAT('$ObjUetWerbetext'),
              CONCAT('$ObjUetPreiszusatz'),
              CONCAT('$ObjUetHPTitel'),
              CONCAT('$ObjUetHPKeywords'),
              CONCAT('$ObjUetHPBeschreibung'),
              CONCAT('$ObjUetHPBildKeywords'),
              CONCAT('$BerUetName'),
              CONCAT('$RegUetName'),
              CONCAT('$EogUetBeschreibung'),
              CONCAT('$EigUetBeschreibung'),
              CONCAT('$EiaUetBeschreibung'),
              CONCAT('$EiaUetPlural'),
              CONCAT('$EitUetBeschreibung'),
              CONCAT('$EinUetBeschreibung'),
              CONCAT('$ObeUetVarchar')
            );
          ";

          if (!$ObjError) {
            $GeoInsertResult = mysql_query_time($ScriptnameRestructure, $GeoInsertSelect);

            if ($GeoInsertResult) {
              write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $ObjObe[0] eingefügt.");
            } else {
              write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Einfügen des Objektes mit der ID $ObjObe[0]: " . mysql_error());
              $ObjError = True;
            }
          }
        }

        // Zuletzt bearbeitetes Objekt aus Geaenderte Objekte loeschen.
        if (!$ObjError && ($LastObjID <> "")) {
          $GobDelete = "
            DELETE FROM GeaenderteObjekte
            WHERE  GOB_FKID_OBJ_ID = $LastObjID;
          ";

          $GobDeleteResult = mysql_query_time($ScriptnameRestructure, $GobDelete);

          if ($GobDeleteResult) {
            write_log($ScriptnameRestructure, "INFORMATION", "Objekt mit der ID $LastObjID aus GeaenderteObjekte gelöscht.");
          } else {
            write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Löschen des Objektes aus GeaenderteObjekte mit der ID $LastObjID: " . mysql_error());
          }
        }

        // Datum fuer zuletzt bearbeitetes Objekt aendern.
        if (!$ObjError && ($LastObjID <> "")) {
          $ObjUpdate = "
            UPDATE Objekte
            SET    OBJ_AENDERUNGSDATUM = NOW()
            WHERE  OBJ_ID = $LastObjID;
          ";

          $ObjUpdateResult = mysql_query_time($ScriptnameRestructure, $ObjUpdate);

          if ($ObjUpdateResult) {
            write_log($ScriptnameRestructure, "INFORMATION", "Aenderungsdatum von Objekt mit der ID $LastObjID geaendert.");
          } else {
            write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Updaten des Datums des Objektes mit der ID $LastObjID: " . mysql_error());
          }
        }

        if ($ObjError) {
          $GotError = True;
        }

        $CurrentObjID = get_next_obj();
      } else {
        write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Selektieren der Objekteigenschaften: " . mysql_error());
        $GotError = True;
      }
    }

    if (!$GotError) {
      $GeoDelete = "
        DELETE FROM GesamtObjekt
        WHERE  OBJ_ID NOT IN (SELECT OBJ_ID FROM Objekte);
      ";

      $GeoDeleteResult = mysql_query_time($ScriptnameRestructure, $GeoDelete);

      if ($GeoDeleteResult) {
        write_log($ScriptnameRestructure, "INFORMATION", "Objekte gelöscht, die nicht mehr Online sind.");
      } else {
        write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Löschen der Objekte, die nicht mehr Online sind: " . mysql_error());
        $GotError = True;
      }

      if (!$GotError) {
        $GobDelete = "
          DELETE FROM GeaenderteObjekte
          WHERE  GOB_FKID_OBJ_ID NOT IN (SELECT OBJ_ID FROM Objekte);
        ";

        $GobDeleteResult = mysql_query_time($ScriptnameRestructure, $GobDelete);

        if ($GobDeleteResult) {
          write_log($ScriptnameRestructure, "INFORMATION", "Objekte aus GeaenderteObjekte gelöscht, die nicht mehr online sind.");
        } else {
          write_log($ScriptnameRestructure, "ERROR", "Es gab folgenden Fehler beim Löschen der Objekte aus GeaenderteObjekte, die nicht mehr Online sind: " . mysql_error());
        }
      }
    }
  } else {
    write_log($ScriptnameRestructure, "ERROR", "Es konnte keine Verbindung zur Datenbank hergestellt werden!");
    $GotError = True;
  }

  $Duration = time() - $Starttime;

  if ($GotError) {
    echo "1\n";
    write_log($ScriptnameRestructure, "ERROR", "Es ist ein Fehler bei der Restrukturierung aufgetreten!");
  } else {
    write_log($ScriptnameRestructure, "STARTSTOP", "Die Restrukturierung wurde erfolgreich durchgeführt. (Dauer: $Duration Sek.)");
    echo "0\n";
  }
?>
