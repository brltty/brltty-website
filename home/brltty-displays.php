The following braille display models are supported.
If you discover that any other displays and/or models work,
or if you know the technical details required to get another one to work,
then please <A HREF="contact.html">let us know</A>.

<?php
   $braille_displays = array(
      array("Albatross",
         "46/80"
      ),

      array("Alva",
         "ABT (3nn)", "Delphi (4nn)", "Satellite (5nn)",
         "Braille System 40", "Braille Controller 640/680"
      ),

      array("Baum",
         "BrailleConnect 12/24/32/40/64/.80", "Brailliant 24/32/40/64/.80",
         "Conny 12", "DM80 Plus", "EcoVario 24/32/40/64/.80", "Inka",
         "NLS eReader Zoomax", "Orbit Reader 20/40", "PocketVario 24",
         "Pronto! V3 18/40", "Pronto! V4 18/40", "RBT 40/80", "Refreshabraille 18",
         "SuperVario 24/32/40/64/.80", "Vario 40/80", "VarioConnect 12/24/32/40/64/.80",
         "VarioPro 40/64/80", "VarioUltra 20/32/40"
      ),

      array("BrailComm",
         "III"
      ),

      array("BRAILLELITE",
         "18/40", "M20/M40"
      ),

      array("BrailleMemo",
         "Pocket", "Smart", "Next Touch"
      ),

      array("BrailleNote",
         "18/32",
         "Apex"
      ),

      array("Braudi"
      ),

      array("BrlAPI"
      ),

      array("Canute",
         "360 (40x9)"
      ),

      array("Cebra",
         "20/40/60/80/100/120/140"
      ),

      array("CombiBraille",
         "25/45/85"
      ),

      array("DotPad"
      ),

      array("EcoBraille",
         "20/40/80"
      ),

      array("EuroBraille",
         "AzerBraille", "Clio", "NoteBraille", "Scriba",
         "Esys", "Esytime", "Iris", "b.note", "b.book"
      ),

      array("FrankAudiodata",
         "B2K84"
      ),

      array("FreedomScientific",
         "Focus 1 44/70/84", "Focus 2 40/80", "Focus Blue 14/40/80",
         "PAC Mate 20/40"
      ),

      array("HandyTech",
         "Modular 20/40/80", "Modular Connect 88", "Modular Evolution 64/88",
         "Active Braille", "Active Braille S", "Active Star 40",
         "Actilino", "Activator", "Activator Pro 64/80",
         "Basic Braille 16/20/32/40/48/64/80",
         "Basic Braille Plus 20/32/40/48/64/80/84",
         "Braillino", "Braille Wave",
         "Easy Braille", "Braille Star 40/80", "Connect Braille 40",
         "Bookworm"
      ),

      array("Hedo",
         "ProfiLine", "MobiLine"
      ),

      array("HIMS",
         "Braille Sense", "BrailleSense 6", "SyncBraille", "Braille Edge",
         "Smart Beetle", "QBrailleXL", "eMotion"
      ),

      array("HumanWare",
         "Brailliant BI 14/32/40", "Brailliant BI 20X/40X",
         "Brailliant B 80", "BrailleNote Touch", "BrailleOne",
         "APH Chameleon 20", "APH Mantis Q40", "NLS eReader"
      ),

      array("Inceptor",
         "BrailleMe (20)"
      ),

      array("Iris"
      ),

      array("Libbraille"
      ),

      array("LogText",
         "32"
      ),

      array("MDV",
         "MB208", "MB248", "MB408L", "MB408L+", "Lilli Blu"
      ),

      array("Metec",
         "BD-40"
      ),

      array("MiniBraille",
         "20"
      ),

      array("MultiBraille",
         "MB125CR", "MB145CR", "MB185CR"
      ),

      array("NinePoint"
      ),

      array("Papenmeier",
         "Compact 486", "Compact/Tiny", "IB 80 CR Soft", "2D Lite (plus)",
         "2D Screen Soft", "EL 80", "EL 2D 40/66/80", "EL 40/66/70/80 S",
         "EL 40/60/80 C", "EL 2D 80 S", "EL 40 P", "EL 80 II",
         "Elba 20/32", "Trio 40/Elba20/Elba32", "Live 20/40"
      ),

      array("Pegasus",
         "20/27/40/80"
      ),

      array("Seika",
         "3/4/5 (40)", "80", "Mini (16)"
      ),

      array("TechniBraille"
      ),

      array("TSI",
         "Navigator 20/40/80", "PowerBraille 40/65/80"
      ),

      array("VideoBraille",
         "40"
      ),

      array("VisioBraille",
         "20/40"
      ),

      array("Voyager",
         "44/70", "Part232 (serial adapter)", "BraillePen/EasyLink"
      ),
   );

   list_drivers($braille_displays);
?>
