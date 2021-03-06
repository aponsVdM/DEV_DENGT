<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
include('../_Fonctions/F_report_err_par_mail.php');
///////////////////////////  F_report_err_par_mail.php  ////////////////////////////////////////////
// contient la fonction qui retourne $chemin_to_racine
// contient la fonction qui envoi mail erreur PHP
// contient la fonction email_err_mysql qui envoi mail des erreurs mysql Exemple: mysql_query($query_2, $Con_PEG_DATA_BO_Prod) or die(email_err_mysql(__FILE__, __LINE__, $Con_PEG_DATA_BO_Prod));
///////////////////////////////////////////////////////////////////////



#require_once($chemin_to_racine.'_Sessions/Verif_Ses.php');
ini_set ('session_use_cookies', 0);
session_start();
$_SESSION['VG_Id_Domaine'] = "L";
$_SESSION['VG_Dir'] = "505";
$_SESSION['VG_Pnom'] = "apons";
$_SESSION['VG_Mdp_OK'] = "OUI";
$_SESSION['VG_droits_DENGT_Ardt'] ="01"; //-------------------------------- a mettre dans verifldap
//////////////////////////////////////////////////
//
//        Maj des Vg et variables par rapport a cette page
//
/////////////////////////////////////////////////

$_SESSION['VG_Applicatif'] = "Travaux > Demande d'engagements";
$v_id_css_logo = "LogoTravaux";
$v_classe_du_Body = "BodyPetitHeader";
$v_id_div_header = "PetitHeaderDGAVE";
$t_menu_burger = array();
$t_menu_burger = array(
    "TRX_03_01_Visu.php?ReInit=0" => "Vérification Factures",
    "#" => "Dépense par Batiment",
    "PROG_05.php?ReInit=0" => "Analyse AO BPU",
    "Marches_01_Esti_00.php?ReInit=0" => "Estimatif",
    "PROG_00.php?ReInit=0" => "Suivi Programmation",
    "DENGT_00.php?ReInit=0" => "Demande Engagement",
);



include ('DENGT_Header.php');


//////////////////////////////////////////////////
//
//     chargement ds bibliotheque spécifiques à la page
//
/////////////////////////////////////////////////
?>
	<!--<script type="text/javascript" src="<? #echo $chemin_to_racine ?>_Jquery/js/jquery.fileDownload.js"></script>-->

	<link rel="stylesheet" href="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxdata.export.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/globalization/globalize.js"></script>
     
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxmenu.js"></script> 
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxexpander.js"></script>
    
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxbuttongroup.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxswitchbutton.js"></script>
    
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.edit.js"></script>  
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.grouping.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.export.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<? echo $chemin_to_racine ?>_Jquery/jqwidgets/jqxgrid.aggregates.js"></script>
    
<div id="corp">
	<?
    //////////////////////////////////////////////////
    //
    //        include de la partie gauche commune a toutes les pages Marchés
    //
    /////////////////////////////////////////////////
    
    #require_once('Marches_Left.php');
    ?>
    <?
    //////////////////////////////////////////////////
    //
    //        Partie droite commune a toutes les pages
    //
    /////////////////////////////////////////////////
    ?>
    <div id="RoueAttente"  class="Attent">
        <br />
        <img src="images/attente_37_39.gif" width="37" height="39" align="absmiddle" />
    </div>
    <div id="right" class="NoShow">
		<? // class NoShow pour masquer pendant les traitements Jquery. Si utiliser ajouter en fin de javascript (voir ci dessous). necessaire pour reafficher quand jquery OK
                //$(window).load(function(){
                    //$('#right').removeClass('NoShow');
                //});
        ?>
        <div id="contenu-right-DENGT">
            <div id="arbo_DENGT">
                <strong>&nbsp;&nbsp;Vous êtes ici :</strong> <i><? echo $_SESSION['VG_Applicatif'] ; ?></i>
            </div>
            <br />
<!--         //////////////////////////////////////////////////
            //
            //        Partie droite propre a cette page
            //
            /////////////////////////////////////////////////
-->            
            <? #if (($_SESSION['VG_Mdp_OK'] == "OUI" ) and ($_SESSION['VG_droits_CTR_visu'] == "OUI" )) { ?>
            <form action="DENGT_02_Enreg_Dem.php" method="post" name="Enreg_DENGT" id="Enreg_DENGT"  enctype="application/x-www-form-urlencoded">
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
              		<tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
                	<tr>
                        <td colspan="2" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Demande N° :</strong> <? echo "....."; ?></td>
                        <td colspan="2" bgcolor="#FFFFFF">&nbsp;<strong>Demandeur :</strong> <? #echo $_SESSION['VG_pnom']; ?></td>
                        <td height="32" bgcolor="#FFFFFF">&nbsp;<strong>Ardt :</strong>&nbsp;<? echo $_SESSION['VG_droits_DENGT_Ardt'];?></td>
                        <td colspan="2" bgcolor="#FFFFFF">&nbsp;<strong>Date derniére MàJ :</strong> <? #echo F_Date_Mysql_Vers_FR($pdo_01[0]['N_01_014_DatMaj#']); ?></td>
              		</tr>
              	</table>
<!--         //////////////////////////////////////////////////
            //
            //        Marche et tiers
            //
            /////////////////////////////////////////////////
--> 
                <div id="expandMarEtTiers" style="font-size: 14px;color: #666666;">
                <div>
                    Informations Marché et Tiers
                </div>
                <div>  <!--pour expand:expandMarEtTiers-->
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
              		<tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
              		<tr>
                        <td width="142" bgcolor="#FFFFFF">&nbsp;<strong>Typ Marché :</strong></td>
                        <td width="142" bgcolor="#FFFFFF" align="left">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectType_CTR" id="SelectType_CTR">
                                	<option value="?">Choisir</option>
                                    <option value="A">MBC Trx</option>
                                    <option value="C">MBC Presta</option>
                                    <option value="D">MBC Period</option>
                                    <option value="N">Non MBC</option>
                                </select>
                            </fieldset>
                        </td>
                        <td colspan="3" bgcolor="#FFFFFF">
                        	<table width="420" border="0" align="center" cellpadding="0" cellspacing="2">
                                <tr>
                                	<td width="142" height="32" align="center">&nbsp;<strong>N° de Marché : </strong></td> 
                                    <td width="70" height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                    <input name="input_ExCtr" id="input_ExCtr" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="4" value="2018" onclick="javascript:if(document.getElementById('input_ExCtr').value == '2018') {document.getElementById('input_ExCtr').value ='';};" onfocus="javascript:if(document.getElementById('input_ExCtr').value == '2018') {document.getElementById('input_ExCtr').value ='';};"/>
                                    </td>
                                    <td width="70" height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                    <input name="input_NumCtr" id="input_NumCtr" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="5" value="99999" onclick="javascript:if(document.getElementById('input_NumCtr').value == '9999') {document.getElementById('input_NumCtr').value ='';};" onfocus="javascript:if(document.getElementById('input_NumCtr').value == '99999') {document.getElementById('input_NumCtr').value ='';};"/>
                                    </td>
                                    <td colspan="2" height="32" align="left" valign="middle" >&nbsp;&nbsp;<img src="images/Verifier_30_30.png" width="30" height="30" style="vertical-align:middle;" title="Verifier ce N° de marché" class="rollove" id="ValidMarche">&nbsp;&nbsp;&nbsp;<img src="images/Loup_30_30.png" width="30" height="30" style="vertical-align:middle;" title="chercher ce N° de marché" class="rollove" id="ValidLoup"></td>
                                </tr>
                        	</table>
                        </td>
                        <td colspan="2" bgcolor="#FFFFFF" id="AfficheCEMbc">&nbsp;
							
                        </td>
                	</tr>
                  	<tr>
                      	<td colspan="7" align="left" bgcolor="#FFFFFF" height="22" style="font-size: 12px;color: #CC6633;" id="AfficheLibCTR">&nbsp;<input name="input_IdCtr" id="input_IdCtr" type="hidden" value="?" /></td>
                  	</tr>
                  	<tr>
                      	<td colspan="7" align="left" bgcolor="#FFFFFF" height="32" id="AfficheLibTiers">&nbsp;<input name="SelectNumTiers" id="SelectNumTiers" type="hidden" value="?" /></td>
                  	</tr>
                    <tr>
                        <td width="142" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Ref. Devis :</strong></td>
                        <!--<td colspan="2" align="left" bgcolor="#FFFFFF" height="32" valign="middle" style="background-image: url(images/Champs/Champ_215_32.png); background-repeat: no-repeat;">&nbsp;-->
                        <td colspan="2" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                        <input name="input_RefDevis" id="input_RefDevis" type="text" size="15" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;vertical-align:top;" value="xxxx" />
                        </td>
                        <td width="142" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Date Devis :</strong></td>
                        <td width="142" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                        <input name="input_DateDevis" id="input_DateDevis" type="text" size="10" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;vertical-align:top;margin-top: 7px;" readonly="readonly" value="00/00/0000" /></td>
                        <td colspan="2" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #FF0000;">&nbsp;<!--<strong><i>alerte unicite<i></strong>--></td>
                	</tr>
               	</table>
                </div>  <!--pour expand:expandMarEtTiers-->
                </div>  <!--<div id="expandMarEtTiers" style="font-size: 14px;color: #666666;">-->
<!--         //////////////////////////////////////////////////
            //
            //        Montant et dates
            //
            /////////////////////////////////////////////////
--> 
                <div id="expandMtEtDatess" style="font-size: 14px;color: #666666;">
                <div>
                    Informations Montant et dates
                </div>
                <div>  <!--pour expand:expandMtEtDatess-->
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
              		<tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
              		<tr>
                        <td width="142" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Taux TVA :</strong></td>
                        <td width="142" bgcolor="#FFFFFF" height="32" align="left">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectType_TVA" id="SelectType_TVA">
                                	<option value="20" selected="selected">20 %</option>
                                    <option value="5">5 %</option>
                                </select>
                            </fieldset>
                        </td>
                        <td width="142" align="left" bgcolor="#FFFFFF" height="32" valign="middle">&nbsp;<strong>Montant :</strong></td>
                        <td width="142" align="right" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                        <input name="input_MtDem" id="input_MtDem" type="text" size="10" style="border: 0; font-size: 14px;color: #666666;background-color:transparent; text-align:right" value="0,00" onclick="javascript:if(document.getElementById('input_MtDem').value == '0,00') {document.getElementById('input_MtDem').value ='';};" onfocus="javascript:if(document.getElementById('input_MtDem').value == '0,00') {document.getElementById('input_MtDem').value ='';};" onblur="check_input_MtDem();"/>&nbsp;€&nbsp;
                        </td>
                        <td width="142" bgcolor="#FFFFFF" align="left" height="32">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectHtTTC" id="SelectHtTTC">
                                	<option value="TTC" selected="selected">TTC</option>
                                    <option value="HT">HT</option>
                                </select>
                            </fieldset>
                        </td>
                        <td height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;" id="AfficheConso">&nbsp;<i>info conso marche<i></td>
                        <td height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;" id="AfficheConso2">&nbsp;
                        <input name="MtDispoCtr" id="MtDispoCtr" type="hidden" value="<? echo $pdo_lignes_sql2['DE_062_Mt_Dispo']; ?>" />
                        </td>
                	</tr>
              		<tr>
                        <td width="142" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Révisable :</strong></td>
                        <td width="142" bgcolor="#FFFFFF" height="32" align="left" id="tdSelectRevisable" style="visibility: hidden;">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectRevisable" id="SelectRevisable">
                                    <option value="Non">Non</option>
                                	<option value="Oui">Oui</option>
                                </select>
                            </fieldset>
                            <input name="val_SelectRevisable" id="val_SelectRevisable" type="hidden" value="?" />
                        </td>
                        <td width="142" align="left" bgcolor="#FFFFFF" height="32" valign="middle" style="visibility: hidden;" id="tdTextRvp">&nbsp;<strong>Taux :</strong></td>
                        <td width="142" align="right" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;visibility: hidden;" id="tdTauxRvp">&nbsp;
                        <input name="input_TauxRvp" id="input_TauxRvp" type="text" size="10" style="border: 0; font-size: 14px;color: #666666;background-color:transparent; text-align:right" value="0,00" onclick="javascript:if(document.getElementById('input_TauxRvp').value == '0,00') {document.getElementById('input_TauxRvp').value ='';};" onfocus="javascript:if(document.getElementById('input_TauxRvp').value == '0,00') {document.getElementById('input_TauxRvp').value ='';};" onblur="check_input_TauxRvp();"/>&nbsp;
                        </td>
                        <td width="142" bgcolor="#FFFFFF" align="left" height="32" style="font-size: 12px;color: #CC6633;visibility: hidden;" id="tdMtRvp"><i>Mt de la revision</i></td>
                        <td colspan="2" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;visibility: hidden;" id="tdAlertRvp">&nbsp;<i>Taux non trouvé</i></td>
                	</tr>
                    <tr id="AfficheDateCtr">
                    	<td colspan="2" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;">&nbsp;<i>date debut marche<i><input name="val_dateDebCtr" id="val_dateDebCtr" type="hidden" size="10" style="border: 1; font-size: 14px;color: #666666;background-color:transparent;" value="" /></td>
                    	<td colspan="4" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;">&nbsp;<i>date fin marche<i><input name="val_dateFinCtr" id="val_dateFinCtr" type="hidden" size="10" style="border: 1; font-size: 14px;color: #666666;background-color:transparent;" value="" /></td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #FF0000;">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td width="142" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Date Début TRX :</strong></td>
                        <td width="142" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;visibility: hidden;" id="tdDateDebTrx">&nbsp;
                        <input name="input_DateDebTRX" id="input_DateDebTRX" type="text" size="10" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;vertical-align:top;margin-top: 7px;" readonly="readonly" value="00/00/0000" /></td>
                    	<td width="142" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Date Fin TRX :</strong></td>
                        <td width="142" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;visibility: hidden;" id="tdDateFinTrx">&nbsp;
                        <input name="input_DateFinTRX" id="input_DateFinTRX" type="text" size="10" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;vertical-align:top;margin-top: 7px;" readonly="readonly" value="00/00/0000" /></td>
                        <td width="142" align="middle" bgcolor="#FFFFFF" height="32" valign="middle">&nbsp;<strong>Ou Durée :</strong></td>
                        <td width="142" align="right" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;visibility: hidden;" id="tdDateDurTrx">&nbsp;
                        <input name="input_DateDuree" id="input_DateDuree" type="text" size="5" style="border: 0; font-size: 14px;color: #666666;background-color:transparent; text-align:right" value="0" onclick="javascript:if(document.getElementById('input_DateDuree').value == '0') {document.getElementById('input_DateDuree').value ='';};" />&nbsp;Jours&nbsp;
                        <td width="142" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #FF0000;" id="tdAlertDate">&nbsp;</td>
                    </tr>
               	</table>
                </div>  <!--pour expand:expandMtEtDatess-->
                </div> <!--<div id="expandMtEtDatess" style="font-size: 14px;color: #666666;">-->
<!--         //////////////////////////////////////////////////
            //
            //        objet et lieu
            //
            /////////////////////////////////////////////////
--> 
                <div id="expandObjEtLieu" style="font-size: 14px;color: #666666;">
                <div>
                    Informations Objet et lieu
                </div>
                <div>  <!--pour expand:expandObjEtLieu-->
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
              		<tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Libellé de la demande de TRX :</strong></td>
                        <td colspan="5" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                        <input name="input_LibTrx" id="input_LibTrx" type="text" size="80" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" value="" onblur="check_input_LibTrx();" />&nbsp;
                        </td>
                    </tr>
              	</table>
                <div id="expandTextLibelle" style="font-size: 14px;color: #666666;">
                	<div>
                    	Renseigner un texte complémentaire
                    </div>
                    <div>
                    	<textarea name="inpute_TexteLong" id="inpute_TexteLong" row="10" cols="100"></textarea>
                    </div>
               	</div>
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
              		<tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
                	<tr>
                    	<td colspan="7" height="32">
                                <div style="margin-top: 10px;float:left" id="radioTrx1">&nbsp;Travaux</div>
                                <div style="margin-top: 10px;float:left" id="radioTrx2">&nbsp;Etude suivis de travaux</div>
                                <div style="margin-top: 10px;float:left" id="radioTrx3">&nbsp;Etude NON suivie de travaux</div>
                      	</td>
                   	</tr>
                	<tr>
                    	<td colspan="7">
                			<input name="input_EtudTrx" id="input_EtudTrx" type="hidden" size="80" style="border: 1; font-size: 14px;color: #666666;background-color:transparent;" value="Trx" />
                      	</td>
                   	</tr>
              		<tr>
                        <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Type de Bâtiment :</strong></td>
                        <td colspan="2" height="32" bgcolor="#FFFFFF" align="left">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectType_BT" id="SelectType_BT">
                                	<option value="?">Choisir</option>
                                    <option value="Elementaire">Elementaire</option>
                                    <option value="Maternelle">Maternelle</option>
                                </select>
                            </fieldset>
                        </td>
                        <td colspan="2" height="32" bgcolor="#FFFFFF" align="right"><strong>La ville est propiétaire :</strong>&nbsp;</td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="left">
                        	<fieldset style="border:0; font-size: 12px;">
                                <select name="SelectVilleProp" id="SelectVilleProp">
                                	<option value="O">Oui</option>
                                    <option value="N">Non</option>
                                </select>
                            </fieldset>
                        </td>
                    <tr>
                    	<td width="142" align="left" bgcolor="#FFFFFF" height="32">&nbsp;<strong>Lieu des TRX :</strong></td>
                        <td colspan="6" align="left" bgcolor="#E7E7E7" height="32" valign="middle" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                        <input name="input_LieuTrx" id="input_LieuTrx" type="text" size="80" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" value=""  onblur="check_input_LieuTrx();"/>&nbsp;
                        </td>
                    </tr>
              	</table>
                </div>  <!--pour expand:expandObjEtLieu-->
                </div> <!--<div id="expandObjEtLieu" style="font-size: 14px;color: #666666;">-->
<!--         //////////////////////////////////////////////////
            //
            //        RefPat
            //
            /////////////////////////////////////////////////
--> 
                <div id="RefPat" style="font-size: 14px;color: #666666;display:none;">
                </div>
<!--         //////////////////////////////////////////////////
            //
            //        compta commune
            //
            /////////////////////////////////////////////////
--> 
            <div id="expandCompta" style="font-size: 14px;color: #666666;">
            <div>
                Informations Comptables
            </div>
            <div> <!--pour expand:expandCompta-->
    <!--         //////////////////////////////////////////////////
                //
                //       Choix type de depense
                //
                /////////////////////////////////////////////////
    --> 
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                    <tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                        <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Type de Dépenses :</strong></td>
                        <td colspan="2" height="32" bgcolor="#FFFFFF" align="left">
                            <fieldset style="border:0; font-size: 12px;">
                                <select name="SelectTypeDep" id="SelectTypeDep">
                                    <option value="?">Choisir</option>
                                    <option value="F">Fonctionnement</option>
                                    <option value="I">Investissement</option>
                                </select>
                            </fieldset>
                        </td>
                        <td colspan="4" height="32" valign="middle">
                            <div id="showInvest" style="display:none">
                                <div style="float:left" id="radioInvest1">&nbsp;OPA</div>
                                <div style="float:left" id="radioInvest2">&nbsp;OPA Imprévus</div>
                                <div style="float:left" id="radioInvest3">&nbsp;OPI</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <input name="input_FoncInvest" id="input_FoncInvest" type="hidden" size="80" style="border: 1; font-size: 14px;color: #666666;background-color:transparent;" value="FONC" />
                        </td>
                    </tr>
                </table>
    <!--         //////////////////////////////////////////////////
                //
                //        compta FONC
                //
                /////////////////////////////////////////////////
    --> 
                <div id="DivFonct" style="font-size: 14px;color: #666666;display:none;">
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                    <tr height="0">
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                        <td width="142" bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                        <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Budget :</strong></td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="left">
                            <?
                            $sql = "
                                SELECT H_006_Budget  
                                FROM 
                                H_IB
                                WHERE 
                                H_002_Srv LIKE '".$v_DirCompta."' 
                                AND 
                                H_007_Fonc_Invst LIKE 'F'
                                group by H_006_Budget;
                                ";
                                #echo $sql."<br>";
                            $pdo_sql = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                            $pdo_total_sql = count($pdo_sql);
                            #echo "tot_".$pdo_total_sql."<br>";
                            ?>
                            <fieldset style="border:0; font-size: 12px;">
                                <select name="SelectTypeBud" id="SelectTypeBud">
                                <? foreach ($pdo_sql as $key_sql  => $pdo_lignes_sql ) {
                                    echo '<option value="'.$pdo_lignes_sql['H_006_Budget'].'">'.$t_lib_budget[$pdo_lignes_sql['H_006_Budget']].'</option>';
                                }
                                ?>
                                </select>
                            </fieldset>
                        </td>
                        <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Nature IB :</strong></td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="left">
                            <?
                            $sql = "
                                SELECT H_027_Ib_Nature,H2_104_Libelle  
                                FROM 
                                H_IB, H2_IB_Libelle 
                                WHERE 
                                H_002_Srv LIKE '".$v_DirCompta."' 
                                AND 
                                H_006_Budget LIKE '00' 
                                AND 
                                H_007_Fonc_Invst LIKE 'F' 
                                and 
                                H2_000_Id_Ib_Lib = concat('N_','00','_',H_027_Ib_Nature) 
                                group by H_027_Ib_Nature;
                                ";
                                #echo $sql."<br>";
                            $pdo_sql = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                            $pdo_total_sql = count($pdo_sql);
                            #echo "tot_".$pdo_total_sql."<br>";
                            ?>
                            <fieldset style="border:0; font-size: 10px;">
                                <select name="SelectIbNat" id="SelectIbNat">
                                    <option value="?">Choisir</option>
                                    <?
                                    if ($pdo_total_sql > 0) {
                                        $v_temp_H_027_Ib_Nature="Vide";
                                        foreach ($pdo_sql as $key_sql  => $pdo_lignes_sql ) {
                                            echo '<option value="'.$pdo_lignes_sql['H_027_Ib_Nature'].'">'.$pdo_lignes_sql['H_027_Ib_Nature'].'-'.utf8_encode($pdo_lignes_sql['H2_104_Libelle']).'</option>';
                                            if ($v_temp_H_027_Ib_Nature=="Vide") {
                                                $v_temp_H_027_Ib_Nature = $pdo_lignes_sql['H_027_Ib_Nature'];
                                            }
                                        }
                                    }
                                    #unset $sql;
                                    #unset $pdo_sql;
                                    #unset $pdo_total_sql;
                                    ?>
                                </select>
                            </fieldset>
                        </td>
                        <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>Fonction IB :</strong></td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="left">
                            <?
                            $sql = "
                                SELECT H_028_Ib_Fonction,H2_104_Libelle  
                                FROM 
                                H_IB, H2_IB_Libelle 
                                WHERE 
                                H_002_Srv LIKE '".$v_DirCompta."' 
                                AND 
                                H_006_Budget LIKE '00' 
                                AND 
                                H_007_Fonc_Invst LIKE 'F' 
                                and 
                                H2_000_Id_Ib_Lib = concat('F_','00','_',H_028_Ib_Fonction) 
                                AND
                                H_027_Ib_Nature LIKE '".$v_temp_H_027_Ib_Nature."' order by H_028_Ib_Fonction;
                                ";
                                #echo $sql."<br>";
                            $pdo_sql = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                            $pdo_total_sql = count($pdo_sql);
                            #echo "tot_".$pdo_total_NatureIb."<br>";
                            ?>
                            <fieldset style="border:0; font-size: 10px;">
                                <select name="SelectIbFonc" id="SelectIbFonc">
                                    <option value="?">Choisir</option>
                                    <?
                                    //if ($pdo_total_sql > 0) {
//                                        foreach ($pdo_sql  as $key_sql  => $pdo_lignes_sql ) {
//                                            echo '<option value"'.$pdo_lignes_sql['H_027_Ib_Nature'].'">'.$pdo_lignes_sql['H_028_Ib_Fonction'].'-'.utf8_encode($pdo_lignes_sql['H2_104_Libelle']).'</option>';
//                                        }
//                                    }
                                    ?>
                                </select>
                            </fieldset>
                        </td>
                        <td width="142" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 12px;color: #CC6633;">&nbsp;<i>info conso Enveloppe<i></td>
                    </tr>
                </table>
                </div>  <!--<div id="DivFonct" style="font-size: 14px;color: #666666;">-->
    <!--         //////////////////////////////////////////////////
                //
                //        Compta OPE
                //
                /////////////////////////////////////////////////
        -->          
                <div id="DivOPE" style="font-size: 14px;color: #666666;display:none;">   
        <!--         //////////////////////////////////////////////////
                    //
                    //        Compta OPI
                    //
                    /////////////////////////////////////////////////
            -->              
                	<div id="DivOPI" style="font-size: 14px;color: #666666;display:none;">
                    <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                        <tr height="0">
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                            <td width="142" bgcolor="#FFFFFF"></td>
                        </tr>
                        <tr>
                            <td width="142" height="32" bgcolor="#FFFFFF">&nbsp;<strong>N° OPE :</strong></td>
                            <td colspan="3" bgcolor="#FFFFFF">
                                <table width="426" border="0" align="center" cellpadding="0" cellspacing="2">
                                    <tr>
                                        <td width="90" height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                        <input name="input_ExOPI" id="input_ExOPI" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="4" value="2018" onclick="javascript:if(document.getElementById('input_ExOPI').value == '2018') {document.getElementById('input_ExOPI').value ='';};" onfocus="javascript:if(document.getElementById('input_ExOPI').value == '2018') {document.getElementById('input_ExOPI').value ='';};"/>
                                        </td>
                                        <td width="70" height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                        <input name="input_TypOPI" id="input_TypOPI" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="4" value="." onclick="javascript:if(document.getElementById('input_TypOPI').value == '.') {document.getElementById('input_TypOPI').value ='';};" onfocus="javascript:if(document.getElementById('input_TypOPI').value == '.') {document.getElementById('input_TypOPI').value ='';};"/>
                                        </td>
                                        <td width="90" height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                        <input name="input_NumOPI" id="input_NumOPI" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="4" value="9999" onclick="javascript:if(document.getElementById('input_NumOPI').value == '9999') {document.getElementById('input_NumOPI').value ='';};" onfocus="javascript:if(document.getElementById('input_NumOPI').value == '9999') {document.getElementById('input_NumOPI').value ='';};"/>
                                        </td>
                                        <td width="40" height="32" align="center" colspan="2" >&nbsp;&nbsp;<img src="images/Verifier_30_30.png" width="30" height="30" style="vertical-align:middle;" title="Verifier ce N° d'Opération" class="rollove" id="ValidOPI"></td>
                                    </tr>
                                </table>
                            </td>
                            <td colspan="3" height="32" bgcolor="#FFFFFF" align="center" style="font-size: 10px;color: #CC6633;"><div id="LibOpi">&nbsp;<i>lib opi<i></div></td>
                        </tr>
                    </table>
                    </div>  <!--<div id="DivOPI" style="font-size: 14px;color: #666666;">-->
                    <div id="DivConsoOPI" style="font-size: 14px;color: #666666;display:none;"> 
                    <!--construi via ajax-->
                    </div><!--<div id="DivConsoOPI" style="font-size: 14px;color: #666666;display:none;">--> 
        <!--         //////////////////////////////////////////////////
                    //
                    //        Compta OPA
                    //
                    /////////////////////////////////////////////////
        -->                 
                    <div id="DivOPA" style="font-size: 14px;color: #666666;display:none;">  	
                		<? // a l'interieur un div pour saisie directe N° MIP si OPA et pas IMP ?>
                        <!--construi via ajax choix de lopa ou saisie directe du mip-->
                        <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                            <tr height="0">
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="100" bgcolor="#FFFFFF"></td>
                                <td width="100" bgcolor="#FFFFFF"></td>
                            </tr>
                            <tr>
                                <td height="32" bgcolor="#FFFFFF">&nbsp;<strong>Exercice :</strong></td>
                                <td height="32" bgcolor="#FFFFFF" align="left">
                                    <fieldset style="border:0; font-size: 12px;">
                                        <select name="SelectEx_OPA" id="SelectEx_OPA">
                                        	<option value="?">Choisir</option>
                                            <option value="<? echo date('Y')-3; ?>"><? echo date('Y')-3; ?></option>
                                            <option value="<? echo date('Y')-2; ?>"><? echo date('Y')-2; ?></option>
                                            <option value="<? echo date('Y')-1; ?>"><? echo date('Y')-1; ?></option>
                                            <option value="<? echo date('Y'); ?>"><? echo date('Y'); ?></option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td height="32" bgcolor="#FFFFFF" align="left">
                                    <fieldset style="border:0; font-size: 12px;">
                                        <select name="SelectNum_OPA" id="SelectNum_OPA">
                                        	<option value="?">Choisir N° OPA</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td> Ou renseigner le N° MIP</td>
                                <td height="32" align="center" bgcolor="#E7E7E7" style="border-radius: 8px;-moz-border-radius: 8px;">&nbsp;
                                        <input name="input_NumMip" id="input_NumMip" type="text" style="border: 0; font-size: 14px;color: #666666;background-color:transparent;" size="5" value="99999" onclick="javascript:if(document.getElementById('input_NumMip').value == '99999') {document.getElementById('input_NumMip').value ='';};" onfocus="javascript:if(document.getElementById('input_NumMip').value == '99999') {document.getElementById('input_NumMip').value ='';};"/>
                            	</td>
                                <td>
                                	<img src="images/Verifier_30_30.png" width="30" height="30" style="vertical-align:middle;" title="Verifier ce N° de MIP" class="rollove" id="ValidMip">
                                </td>
                          	</tr>
                    	</table>
                    </div><!--<div id="DivOPA" style="font-size: 14px;color: #666666;display:none;">-->
                    <div id="expandListMip" style="font-size: 14px;color: #666666;display:none;">
                    <div>
                        Liste des MIP
                    </div>
            		<div> <!--pour expand:expandCompta-->
                    <div id="DivMip" style="font-size: 14px;color: #666666;display:none;">  	
                    	<!--construi via ajax Liste des mip-->
                        <table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" style="font-size: 8px;color: #333333;">
                            <tr>
                                <th colspan="12" bgcolor="#CCCCCC" style="text-align: center;font-size: 10px"">&nbsp;<span style="color:#000">De l'OPERATION&nbsp;<? #echo $pdo_lignes['F_000_Id_Ope']; ?>&nbsp;</span></th>
                            </tr>
                            <tr>
                                <th width="40" scope="row" style="text-align: center">Selectionner</th>
                                <th width="70" scope="row" style="text-align: center">N° MIP</th>
                                <th width="210" scope="row" style="text-align: center">Lieu</th>
                                <th width="330" scope="row" style="text-align: center">Libellé MIP</th>
                                <th width="70" scope="row" style="text-align: center">Mt Prév.</th>
                                <th width="70" scope="row" style="text-align: center">Mt Reval.</th>
                                <th width="70" scope="row" style="text-align: center">Mt Engt.</th>
                                <th width="70" scope="row" style="text-align: center">Mt Circuit</th>
                                <th width="70" scope="row" style="text-align: center">Mt Dispo</th>
                            </tr>
                    	</table>
                    </div><!--<div id="DivMip" style="font-size: 14px;color: #666666;display:none;">-->
                    </div> <!--pour expand:expandCompta-->
                    </div><!--<div id="expandListMip" style="font-size: 14px;color: #666666;">-->
                    
                    
                    
                    
                    <div id="DivOPA_IMP" style="font-size: 14px;color: #666666;display:none;">  	
                		<? // a l'interieur un div pour saisie directe N° MIP si OPA et pas IMP ?>
                        <!--construi via ajax choix de lopa ou saisie directe du mip-->
                        <table width="1000" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                            <tr height="0">
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="200" bgcolor="#FFFFFF"></td>
                                <td width="100" bgcolor="#FFFFFF"></td>
                                <td width="100" bgcolor="#FFFFFF"></td>
                            </tr>
                            <tr>
                                <td height="32" bgcolor="#FFFFFF">&nbsp;<strong>Exercice :</strong></td>
                                <td height="32" bgcolor="#FFFFFF" align="left">
                                    <fieldset style="border:0; font-size: 12px;">
                                        <select name="SelectEx_OPA_IMP" id="SelectEx_OPA_IMP">
                                        	<option value="?">Choisir</option>
                                            <option value="<? echo date('Y')-3; ?>"><? echo date('Y')-3; ?></option>
                                            <option value="<? echo date('Y')-2; ?>"><? echo date('Y')-2; ?></option>
                                            <option value="<? echo date('Y')-1; ?>"><? echo date('Y')-1; ?></option>
                                            <option value="<? echo date('Y'); ?>"><? echo date('Y'); ?></option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td colspan="4" height="32" bgcolor="#FFFFFF" align="left">
                                    <fieldset style="border:0; font-size: 12px;">
                                        <select name="SelectNum_OPA_IMP" id="SelectNum_OPA_IMP">
                                        	<option value="?">Choisir N° OPA</option>
                                        </select>
                                    </fieldset>
                                </td>
                          	</tr>
                    	</table>
                    </div><!--<div id="DivOPA" style="font-size: 14px;color: #666666;display:none;">-->
                    
                    
                    <div id="DivMipDetail" style="font-size: 14px;color: #666666;display:none;">
                    detail Mip
                    </div><!--<div id="DivMipDetail" style="font-size: 14px;color: #666666;display:none;">-->
                    
                    <div id="DivDepasMip" style="font-size: 14px;color: #666666;display:none;">  	
                      <!--construi via ajax depassement Mip ou Mip IMP-->
                      DivDepasMip
                      <div id="DepassementMt">
                      DepassementMt dans DivDepasMip
                      </div>
                      <div id="Textejustifdepas">
                      Textejustifdepas dans DivDepasMip
                      </div>
                      Fin DivDepasMip
                    </div><!--<div id="DivDepasMip" style="font-size: 14px;color: #666666;display:none;">-->
                
                
                    
        <!--         //////////////////////////////////////////////////
                    //
                    //        Compta partie commune OPA et OPI -- (IB et resa)
                    //
                    /////////////////////////////////////////////////
        -->
                    <div id="DivComptaOP" style="font-size: 14px;color: #666666;display:none;"> 
                    	<!--construi via ajax-->
                    </div><!--<div id="DivComptaOP" style="font-size: 14px;color: #666666;display:none;">-->
            	</div><!--<div id="DivOPE" style="font-size: 14px;color: #666666;display:none;">-->
         	</div> <!--pour expand:expandCompta-->
            </div> <!--<div id="expandCompta" style="font-size: 14px;color: #666666;">-->
             	
<!--         //////////////////////////////////////////////////
            //
            //        Boutons
            //
            /////////////////////////////////////////////////
-->
                <div id="Boutons">
                	<br />
                	<table width="1020" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" style="font-size: 14px;color: #666666;">
                        <tr height="5">
                            <td width="400"></td>
                            <td width="400"></td>
                            <td width="400"></td>
                        </tr>
                        <tr align="center">
                        	<td align="left" valign="middle" width="400">
                            &nbsp;&nbsp;<img src="images/Boutons/BT_DENG_Annul_160_32.png" width="160" height="32" alt="Annuler" border="0" style="border:0px; outline: none;vertical-align:middle;" class="rollove" /><br />&nbsp;&nbsp;
                            </td>
                        	<td align="right" valign="middle" width="400">
                            <img src="images/Boutons/BT_DENG_Projet_160_32.png" width="160" height="32" alt="Annuler" border="0" style="border:0px; outline: none;vertical-align:middle;" class="rollove" /><br />&nbsp;&nbsp;
                            </td>
                        	<td align="right" valign="middle" width="400">
                            <div id="show_Bt_enreg" style="display:none;">
                            	<div id="click_Bt_enreg">
                            		<img src="images/Boutons/BT_DENG_Enreg_160_32.png" width="160" height="32" alt="Annuler" border="0" style="border:0px; outline: none;vertical-align:middle;" class="rollove" />&nbsp;&nbsp;
                                </div>
                                <br />Suivre la demande par mail&nbsp;<div id="SwitchMail" style="display:inline-block; vertical-align: middle "></div>
                                <input type="hidden" name="SuiviMail" id="SuiviMail" value="">
                            </div>
                            </td>
                       	</tr>
                        <tr height="5">
                            <td width="400"></td>
                            <td width="400"></td>
                            <td width="400"></td>
                        </tr>
                   	</table>
                
                </div><!--<div id="Boutons">-->
                <input type="hidden" name="v_page_php" id="v_page_php" value="<? echo $v_page; ?>">
				<input name="V_PHP_SELF" type="hidden" value="<? echo $_SERVER['PHP_SELF'] ?>">
           	</form>
            
          <div id="DENGT_Avanc">
             <img id="DENGT_Avanc_1" src="images/Etapes/Etape_DENGT_1_gris.png" width="74" height="117" />
             <img id="DENGT_Avanc_2" src="images/Etapes/Etape_DENGT_2_gris.png" width="74" height="117" />
             <img id="DENGT_Avanc_3" src="images/Etapes/Etape_DENGT_3_gris.png" width="74" height="117" />
             <img id="DENGT_Avanc_4" src="images/Etapes/Etape_DENGT_4_gris.png" width="74" height="117" />
             <img id="DENGT_Avanc_5" src="images/Etapes/Etape_FIN_gris.png" width="74" height="117" />
          </div>
            
            <? #} if (($_SESSION['VG_Mdp_OK'] == "OUI" ) and ($_SESSION['VG_droits_CTR_visu'] == "OUI" )) { ?>
<!--         //////////////////////////////////////////////////
            //
            //        FIN Partie droite propre a cette page
            //
            /////////////////////////////////////////////////
-->            
    	</div> <!--<div id="contenu-right-DENGT">-->
	</div> <!--<div id="right"  class="NoShow">-->
</div> <!--<div id="corp">-->
<?
//////////////////////////////////////////////////
//
//        include du footer commun a toutes les pages
//
/////////////////////////////////////////////////

require_once('Footer.php');

?>

<!-- container pour growl sans case fermeture-->
<div id="containerGrowlErr0_Auto" style="display:none; z-index:1000; margin-left: 50px;; margin-top: 160px;">
		<div id="withIcon">
			<div style="float:left;margin:0 10px 0 0"><img src="#{icon}" alt="warning" /></div>
			<h1>#{title}</h1>
			<p>#{text}</p>
		</div>
</div>
<!-- fin container pour growl sans case fermeture -->


<!-- container attente download -->
<div id="preparing-file-modal" title="Téléchargement en cours..." style="display: none;">
    <br />
	<br />
	<br />
	<div style="text-align:center"><img src="images/attente_37_39.gif" width="37" height="39" align="absmiddle" /></div>
</div>

<div id="error-modal" title="Error" style="display: none;">
    Téléchargement impossible
</div>

<!-- ######################################################################################## -->
<!-- ######################  JAVA SCRIPT  ################################################### -->
<!-- ######################################################################################## -->
<?
require_once('DENG_02_01_crea_dem.js');
?>


<!-- ######################################################################################## -->
<!-- ######################  FIN JAVA SCRIPT  ############################################### -->
<!-- ######################################################################################## -->