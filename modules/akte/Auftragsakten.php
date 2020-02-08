<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: Jörg Droste
 * The Initial Developer of the Original Code is Jörg Droste.
 * All Rights Reserved.
 * If you have any questions or comments, please email: info@j-droste.de
 ************************************************************************************/
require_once('data/CRMEntity.php');
require_once('data/Tracker.php');
include_once('vtlib/Vtiger/Module.php');

class Auftragsakten {

    /**
     * Invoked when special actions are performed on the module.
     *
     * @param String $moduleName
     * @param String $event_type
     */
    function vtlib_handler($moduleName, $event_type) {
        global $adb;
        $moduleInstance = Vtiger_Module::getInstance($moduleName);
        if($event_type == 'module.postinstall') {

            $this->createSettingField();

            // Initialize settings
            $path = "INSERT INTO vtiger_auftragsakten VALUES
                ('comp_path', '')";
            $adb->pquery($sql,array());

            // Register header js script
            if($moduleInstance) {
                $moduleInstance->addLink('DETAILVIEWWIDGET','AKtenordner','file://c:\');
            }
          
        } else if($event_type == 'module.disabled') {

            // Unregister header js script
            if($moduleInstance) {
                $moduleInstance->deleteLink('DETAILVIEWWIDGET','AKtenordner','file://c:\');
            }

            // There is no vtlib method so direct DB update
            $adb->pquery('UPDATE vtiger_settings_field SET active = 1 WHERE name = ?',array('Auftragsakten'));

        } else if($event_type == 'module.enabled') {

            // Register header js script
            if($moduleInstance) {
                $moduleInstance->addLink('DETAILVIEWWIDGET','AKtenordner','file://c:\');
            }

            // There is no vtlib method so direct DB update
            $adb->pquery('UPDATE vtiger_settings_field SET active = 0 WHERE name = ?',array('Auftragsakten'));

            // Enable additional fields
           

        } else if($event_type == 'module.preuninstall') {
            // TODO Handle actions when this module is about to be deleted.
        } else if($event_type == 'module.preupdate') {
            // TODO Handle actions before this module is updated.
        } else if($event_type == 'module.postupdate') {
            // TODO Handle actions after this module is updated.
        }

    }

    /**
     * Create Setting
     * ( There is no vtlib method so direct DB update )
     */
   

    /**
     * Add new field to $module
     * @param string $module
     * @param array() $params
     */
   

    /**
     * Set presence to chosen field
     * @param string $module
     * @param string $field
     * @param int $presence
     */

}

?>
