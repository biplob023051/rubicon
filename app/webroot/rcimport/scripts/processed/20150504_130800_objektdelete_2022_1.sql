DELETE FROM Uebersetzungen
WHERE  ueb_nummer IN (SELECT obj_uen_name         FROM Objekte             WHERE obj_id = 2022)
OR     ueb_nummer IN (SELECT obj_uen_ueberschrift FROM Objekte             WHERE obj_id = 2022)
OR     ueb_nummer IN (SELECT obj_uen_werbetext    FROM Objekte             WHERE obj_id = 2022)
OR     ueb_nummer IN (SELECT obj_uen_preiszusatz  FROM Objekte             WHERE obj_id = 2022)
OR     ueb_nummer IN (SELECT obe_uen_varchar      FROM Objekteigenschaften WHERE obe_fkid_obj_id = 2022);
