<?php
include_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Event.php');

/**
 * Module class definition
 */
class Auftragsakten {}


$moduleInstance = Vtiger_Module::getInstance('ModuleName');
$moduleInstance->addLink(<DETAILVIEWWIDGET>, <aUFTRAGSAKTEN>, <tESTAKTE>);



    /**
     * Invoked when special actions are performed on the module.
     *
     * @param String Module name
     * @param String Event Type
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

            // Register Widget
            if($moduleInstance) {
                $moduleInstance->addLink('DETAILVIEWWIDGET', 'Auftragsakten', 'template/views/List.php');
            }
          
        } else if($event_type == 'module.disabled') {

            // Unregister Widget
            if($moduleInstance) {
                $moduleInstance->deleteLink('DETAILVIEWWIDGET', 'Auftragsakten', 'template/views/List.php');
            }
            
             $AccountsInstance = Vtiger_Module::getInstance('Accounts');
            Vtiger_Event::unregister($AccountsInstance, 'vtiger.entity.aftersave', 'AuftragsaktenHandler', 'modules/Auftragsakten/Auftragsakten.php');

            echo "Module disabled";

            // There is no vtlib method so direct DB update
            $adb->pquery('UPDATE vtiger_settings_field SET active = 1 WHERE name = ?',array('Auftragsakten'));

        } else if($event_type == 'module.enabled') {
       if ($eventType == 'module.enabled') {
           
            // Register Widget
            if($moduleInstance) {
                $moduleInstance->addLink('DETAILVIEWWIDGET', 'Auftragsakten', 'template/views/List.php');
            }
            // Register an event handler for the Accounts module for the aftersave event
            $AccountsInstance = Vtiger_Module::getInstance('Accounts');
            Vtiger_Event::register($AccountsInstance, 'vtiger.entity.aftersave', 'AuftragsaktenHandler', 'modules/Auftragsakten/Auftragsakten.php');

            echo "Module enabled";
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
 
